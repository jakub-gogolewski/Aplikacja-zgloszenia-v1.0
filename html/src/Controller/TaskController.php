<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\User;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class TaskController extends AbstractController
{
    #[Route('/task', name: 'app_task')]
    public function index(Request $request): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        return $this->render('task/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/task/add', name: 'app_task_add')]
    public function add(EntityManagerInterface $em, Request $request, TaskRepository $tr): JsonResponse
    {
        $user = $this->getUser();

        if ($id = $request->request->all()['task']['id'] ?? false)
        {
            $task = $tr->find($id);
        }
        else
        {
            $task = new Task();
        }
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid())
            return new JsonResponse('Niepełne dane', 500);
        
        try {
            $task->setCreator($user);
            $em->persist($task);
            $em->flush();
            
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
                'info' => $e->getMessage()
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
            // ->where('e.deleted = false')
            ->where('e.startDate > :startDate')
            ->andWhere('e.endDate < :endDate')
            ->setParameter('startDate', $start)
            ->setParameter('endDate', $end);

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

    #[Route('/api/task', name: 'crud_task_create', methods: ['PUT'])]
    public function crud_create(Request $request): JsonResponse
    {
        try {
            $task = new Task();
            $form = $this->createForm(TaskType::class, $task);
            $form->handleRequest($request);
            
            $task->setDeleted(true);
            $em->persist($task);
            $em->flush();

            return new JsonResponse(['status' => 'OK']);
        } catch (\Throwable $e) {
            return new JsonResponse(['status' => 'ERROR']);
        }
    }
}
