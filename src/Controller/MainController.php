<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'users' => $users,
        ]);
    }

    #[Route('/user/delete/{id}', name: 'delete_user', methods: ["POST"])]
    public function deleteUser($id, UserRepository $userRepository, EntityManagerInterface $em, #[CurrentUser] $currentUser) : JsonResponse
    {

        $user = $userRepository->find($id);

        if ($currentUser->getId() === $user->getId()) {
            return new JsonResponse(['message' => 'Nie możesz usunąć siebie'], Response::HTTP_FORBIDDEN);
        }

        if ($user) {
            $em->remove($user);
            $em->flush();
            return new JsonResponse(['message' => 'Użytkownik usunięty pomyślnie'], Response::HTTP_OK);
        }
        return new JsonResponse(['message' => 'Nie znaleziono takiego użytkownika'], Response::HTTP_NOT_FOUND);
    }

}
