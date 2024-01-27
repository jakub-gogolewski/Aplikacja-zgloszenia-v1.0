<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Form\FormError;


class RegistrationController extends AbstractController
{
    
    private $turnstileSecretKey = '0x4AAAAAAAP3mAd8YUJf68nXQOpzRoddF1M';// Zmień na swój kluczek sekretny
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    private function verifyTurnstileResponse(string $response): bool
    {

        $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
        $data = [
            'secret' => $this->turnstileSecretKey,
            'response' => $response
        ];
    
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
    
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
    
        // Najpierw dekoduj odpowiedź
        $responseKeys = json_decode($result, true);
        
        // Teraz sprawdź, czy otrzymałeś sukces i czy wynik nie był FALSE
        if ($result === FALSE || !($responseKeys['success'] ?? false)) {
            // Jeśli Turnstile nie zwróci sukcesu lub jeśli żądanie nie powiodło się, wyrzuć wyjątek z wiadomością
            //throw new CustomUserMessageAuthenticationException('Błąd weryfikacji! Czy jesteś człowiekiem?');
            return false;
        } 
    
        // Jeśli wszystko jest w porządku, zwróć true
        return true;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {

        if ($this->getUser()) {
            return $this->redirectToRoute('app_main');
       }
       
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
        // Dodaj sprawdzenie Turnstile
        $turnstileResponse = $request->request->get('cf-turnstile-response', '');

        if (!$this->verifyTurnstileResponse($turnstileResponse)) {
            $this->addFlash('error', 'Błąd weryfikacji Turnstile. Czy jesteś człowiekiem?');
            return $this->render('security/login.html.twig', [
                'registrationForm' => $form->createView(),
                'destination' => '/register'
            ]);
        }

        $plainPassword = $form->get('plainPassword')->getData();
        $repeatPassword = $form->get('repeatPassword')->getData();
        
        if ($plainPassword !== $repeatPassword) {
            // Dodaj błąd do formularza
            $form->get('repeatPassword')->addError(new FormError('Hasła nie są identyczne.'));
    
            // Wyświetl formularz rejestracji ponownie
            return $this->render('security/login.html.twig', [
                'registrationForm' => $form->createView(),
                'destination' => '/register'
            ]);
        }
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $plainPassword
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('drugalawkapolewej@gmail.com', 'LB-Solutions'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            // do anything else you need here, like send an email

            $this->addFlash('notice', 'Sprawdź maila i potwierdź konto.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/login.html.twig', [
            'registrationForm' => $form->createView(),
            'destination' => '/register'
        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        $id = $request->query->get('id');

        if (null === $id) {
            return $this->redirectToRoute('app_login');
        }

        $user = $userRepository->find($id);

        if (null === $user) {
            return $this->redirectToRoute('app_login');
        }

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);

            $user->addRole('ROLE_VERIFIED');
            $entityManager->persist($user);
            $entityManager->flush();

        }catch (ExpiredSignatureException $expiredException) {
            // Usuń użytkownika z bazy danych
            $entityManager->remove($user);
            $entityManager->flush();

            $this->addFlash('error', 'Link weryfikacyjny wygasł. Prosimy o ponowną rejestrację.');

            // Przekieruj do formularza rejestracji
            return $this->redirectToRoute('app_register');
        } 
        catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_error',$translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_login');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('notice', 'Mail potwierdzony, możesz się zalogować.');

        return $this->redirectToRoute('app_login');
    }
}
