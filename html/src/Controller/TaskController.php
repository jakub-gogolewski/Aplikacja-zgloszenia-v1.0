<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\User;
use App\Entity\State;
use App\Entity\StateRelation;
use App\Form\TaskType;
use App\Repository\ApiKeysRepository;
use App\Repository\TaskRepository;
use App\Repository\StateRelationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;

class TaskController extends AbstractController
{
    #[Route('/task', name: 'app_task')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        $qb = $em->createQueryBuilder();

        $stateRelations =
            $qb->select('ps.name as previous, ns.name as next')
                ->from(StateRelation::Class, 'sr')
                ->leftJoin(State::Class, 'ps', 'WITH', 'ps.id = sr.previousState')
                ->leftJoin(State::Class, 'ns', 'WITH', 'ns.id = sr.nextState')
                ->getQuery()->getResult()
        ;

        return $this->render('task/index.html.twig', [
            'form' => $form->createView(),
            'relations' => $stateRelations
        ]);
    }

    #[Route('/task/add', name: 'app_task_add')]
    public function add(EntityManagerInterface $em, Request $request, MailerInterface $mailer, TaskRepository $tr): JsonResponse
    {
        $user = $this->getUser();

        if ($id = $request->request->all()['task']['id'] ?? false)
        {
            $task = $tr->find($id);
            $currentState = $task->getState();
            $u = $task->getCreator();

            $form = $this->createForm(TaskType::class, $task);
            $form->handleRequest($request);

            if ($currentState->getId() != $task->getState()->getId())
            {
                $email = (new TemplatedEmail())
                    ->from(new Address('drugalawkapolewej@gmail.com', 'LBSolutions'))
                    ->to($u->getEmail())
                    ->subject('Twoje zlecenie zmieniło status')
                    ->htmlTemplate('task/change_state_email.html.twig')
                    ->context([
                        'name'  => $u->getName(),
                        'task'  => $task->getName(),
                        'current_state' => $currentState->getName(),
                        'new_state'     => $task->getState()->getName()
                    ])  
                ;
            }
        }
        else
        {
            $task = new Task();
            $form = $this->createForm(TaskType::class, $task);
            $form->handleRequest($request);

            $email = (new TemplatedEmail())
                ->from(new Address('drugalawkapolewej@gmail.com', 'LBSolutions'))
                ->to($task->getAssigned()->getEmail())
                ->subject('Nowe zadanie')
                ->htmlTemplate('task/new_task_email.html.twig')
                ->context([
                    'name'  => $task->getAssigned()->getName(),
                    'task'  => $task->getName(),
                ])  
            ;
        }

        if (!$form->isSubmitted() || !$form->isValid())
            return new JsonResponse('Niepełne dane', 500);
        
        try {
            $task->setCreator($user);
            $em->persist($task);
            $em->flush();
            
            if (isset($email)) {
                $mailer->send($email);
            }

            return new JsonResponse(
                [
                    'id'    => $task->getId(),
                    'status' => 'OK',
                    'color' => $task->getAssigned()->getColor() ?? '#039be5'
                ],
                200
            );
        }
        catch (\Throwable $e)
        {
            return new JsonResponse([
                'status' => 'Error',
                'info' => $e->getLine()
            ], 200);
        }
    }

    #[Route('/task/get', name: 'app_task_get')]
    public function get(EntityManagerInterface $em, Request $request): JsonResponse
    {
        try
        {
            $d = $request->query->get('start') ?: 'invalid';

            $start = new \DateTime($d);
        }
        catch (\Throwable)
        {
            $start = new \DateTime();

            if ($start->format('N') != 1) // N = 1 dla poniedziałku
                $start->modify('last monday');
        }

        try
        {
            $d = $request->query->get('end') ?: 'invalid';

            $end = new \DateTime($d);
        }
        catch (\Throwable)
        {
            $end = new \DateTime();
            if ($end->format('N') != 7) // N = 7 dla niedzieli
                $end->modify('next sunday');
        }

        $qb = $em->createQueryBuilder();

        $qb->select('e')
            ->from(Task::class, 'e')
            ->where('e.deleted is not true')
            ->where('e.startDate > :startDate')
            ->andWhere('e.endDate < :endDate')
            ->setParameter('startDate', $start)
            ->setParameter('endDate', $end);

        $user = $this->getUser();

        if ($this->isGranted('ROLE_EMPLOYEE'))
        {
            // admin widzi wszystko - brak warunków dodania/przypisania
            if (!$this->isGranted('ROLE_ADMIN'))
            {
                $qb->andWhere('e.creator in (:user) OR e.assigned in (:user)');
                $qb->setParameter('user', [$user, $user->getSubordinates()]);
            }
        }
        else
        {
            $qb->andWhere('e.creator = :user OR e.assigned = :user');
            $qb->setParameter('user', $user);
        }

        $tasks = $qb->getQuery()->getResult();
        
        return new JsonResponse(array_map(function ($el)
        {
            return [
                'id'    => $el->getId(),
                'start' => $el->getStartDate()->format('c'),
                'end'   => $el->getEndDate()->format('c'),
                'name'  => $el->getName(),
                'description'   => $el->getDescription(),
                'assigned'  =>
                    ($el->getAssigned()?->getName() . ' ' . $el->getAssigned()?->getLastName())
                    ?? 'N/N',
                'assignedId'=> $el->getAssigned()?->getId(),
                'color' => $el->getAssigned()?->getColor(),
            ];
        }, $tasks), 200);
    }

    #[Route('/task/delete', name: 'app_task_detele')]
    public function delete(EntityManagerInterface $em, Request $request, TaskRepository $tr): JsonResponse
    {
        $id = $request->request->get('id') ?? false;
        if (!$id)
        {
            return new JsonResponse(['status' => 'ERROR', 'info' => 'Nie ma takiego zadania']);
        }
        
        try {
            $task = $tr->find($id);

            if ($task->isDeleted())
                return new JsonResponse(['status' => 'ERROR', 'info' => 'To zadanie jest już usunięte']);

            $task->setDeleted(true);
            $em->persist($task);
            $em->flush();
        } catch (\Throwable) {
            return new JsonResponse(['status' => 'ERROR', 'info' => 'Nie udało się usunąć zadania']);
        }
        return new JsonResponse(['status' => 'OK']);
    }

    #[Route('/api/task/create', name: 'crud_task_create', methods: ['POST'])]
    public function crud_create(Request $request, EntityManagerInterface $em, ApiKeysRepository $akr): JsonResponse
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
            
        if (!(
            $apiKey = $request->request->get('apiKey', false)
        ))
            return new JsonResponse(['status' => 'ERROR', 'message' => 'Brak API Key']);

        try {
            $user = $akr->find($apiKey)->getApiUser();

            if (!$user->hasRole('ROLE_API'))
                return new JsonResponse(['status' => 'ERROR', 'message' => 'Błędny API Key']);
            
            $task->setCreator($user);
        } catch (\Throwable $e) {
            return new JsonResponse(['status' => 'ERROR', 'message' => 'Błędny API Key']);
        }
            
        try {
            $em->persist($task);
            $em->flush();

            return new JsonResponse(['status' => 'OK']);
        } catch (\Throwable $e) {
            return new JsonResponse(['status' => 'ERROR', 'message' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    #[Route('/api/task/update', name: 'crud_task_update', methods: ['POST'])]
    public function crud_update(Request $request, EntityManagerInterface $em, TaskRepository $tr, ApiKeysRepository $akr): JsonResponse
    {
        $post = $request->request->all();

        if (!(
            $id = $post['task']['id']
        )) {
            return new JsonResponse(['status' => 'ERROR']);
        }

        try {
            $task = $tr->find($id);
        } catch (\Throwable $e) {
            return new JsonResponse(['status' => 'ERROR', 'messenger' => 'Błędne id']);
        }

        // #region API KEY

        if (!(
            $apiKey = $request->request->get('apiKey', false)
        )) {
            return new JsonResponse(['status' => 'ERROR', 'message' => 'Brak API Key']);
        }

        $user;
        try {
            $user = $akr->find($apiKey)->getApiUser();

            if (!$user->hasRole('ROLE_API'))
                return new JsonResponse(['status' => 'ERROR', 'message' => 'Błędny API Key']);
        } catch (\Throwable $e) {
            return new JsonResponse(['status' => 'ERROR', 'message' => 'Błędny API Key']);
        }

        // #endregion

        try {
            if (isset($post['task']['name']))
                $task->setName($post['task']['name']);

            if (isset($post['task']['description']))
                $task->setName($post['task']['description']);

            if (isset($post['task']['startDate']))
                $task->setName($post['task']['startDate']);

            if (isset($post['task']['endDate']))
                $task->setName($post['task']['endDate']);

            if (isset($post['task']['assigned']))
                $task->setName($post['task']['assigned']);

            if (isset($post['task']['creator']))
                $task->setName($post['task']['creator']);

            $em->persist($task);
            $em->flush();
            
            return new JsonResponse(['status' => 'OK']);
        } catch (\Throwable $e) {
            return new JsonResponse(['status' => 'ERROR', 'message' => 'Błędne dane' . $e->getMessage()]);
        }    
    }

    #[Route('/api/task/delete', name: 'crud_task_update', methods: ['POST'])]
    public function crud_delete(Request $request, EntityManagerInterface $em, TaskRepository $tr, ApiKeysRepository $akr): JsonResponse
    {
        if (!(
            $apiKey = $request->request->get('apiKey', false)
        )) {
            return new JsonResponse(['status' => 'ERROR', 'message' => 'Brak API Key']);
        }

        if (!(
            $id = $request->request->get('id')
        )) {
            return new JsonResponse(['status' => 'ERROR']);
        }

        try {
            $task = $tr->find($id);
        } catch (\Throwable $e) {
            return new JsonResponse(['status' => 'ERROR', 'message' => 'Błędne id']);
        }

        $em->remove($task);
        $em->flush();

        return new JsonResponse(['status' => 'OK']);
    }
}
