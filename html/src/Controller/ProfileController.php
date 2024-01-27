<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginFormType;
use App\Form\RegistrationFormType;
use App\Security\LoginAuthenticator;
use App\Form\ChangePasswordFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Security;

class ProfileController extends AbstractController
{
    private $session;

    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getCurrentRequest()->getSession();
    }

	#[Route('/my-profile', name: 'app_my_profile')]
	public function my_profile(#[CurrentUser] $user, Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): Response
	{	

		$form = $this->createForm(ChangePasswordFormType::class, $user);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid())
		{
			$user->setPassword(
				$passwordHasher->hashPassword(
					$user,
					$form->get('plainPassword')->getData()
				)
			);

			$em->persist($user);
			$em->flush();

			$this->session->getFlashBag()->add('notice', 'Hasło pomyślnie zmieniono!');

			return $this->render('user/my-profile.html.twig', [
				'resetForm' => $form
			]);
		}

		return $this->render('user/my-profile.html.twig', [
			'resetForm' => $form
        ]);
	}

    #[Route('/api/user/edit/{id}')]
	public function editUserApi($id,Request $request, EntityManagerInterface $em)
	{
		$post = $request->request;
		$user = $em->getRepository(User::Class)->find($id);

		if ($post->get('name', false))
			$user->setName($post->get('name'));
		
		if ($post->get('lastname', false))
            $user->setLastname($post->get('lastname'));

		if ($post->get('email', false))
            $user->setEmail($post->get('email'));
		
		$em->persist($user);
		$em->flush();

		return new Response($id, 200);
	}

	#[Route('/api/user/remove/{id}')]
    public function removeUserApi(string $id, Request $request, EntityManagerInterface $em, TokenStorageInterface $tokenStorage)
    {   
        $userToRemove = $em->getRepository(User::Class)->find($id);

        if ($userToRemove === null) {
            return new Response('error', 200);
        }
    
        // Pobierz aktualnie zalogowanego użytkownika
        $currentUser = $this->getUser();
    
        // Sprawdź, czy aktualnie zalogowany użytkownik jest tym, którego chce usunąć
        // lub czy jest administratorem
        if ($currentUser->getId() !== $userToRemove->getId() && !in_array('ROLE_ADMIN', $currentUser->getRoles())) {
            throw new AccessDeniedException('Nie można wykonać tej operacji.');
        }
    
        // Usuń użytkownika
        $em->remove($userToRemove);
        $em->flush();
    
        // Wyloguj, jeśli użytkownik usunął samego siebie
        if ($currentUser->getId() === $userToRemove->getId()) {
            $tokenStorage->setToken(null);
            $request->getSession()->invalidate();
            return $this->redirectToRoute('app_login');
        }
    
        return new Response('success', 200);
}

