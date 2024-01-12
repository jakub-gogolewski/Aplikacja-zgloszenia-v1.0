<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;


class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private $urlGenerator;

    // Dodaj tutaj swoje własne klucze,  najlepiej jako parametry serwisu 
    private $turnstileSecretKey = '0x4AAAAAAAP3mAd8YUJf68nXQOpzRoddF1M';// Zmień na swój kluczek sekretny

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');
        $password = $request->request->get('password', '');
        $csrfToken = $request->request->get('_csrf_token');
        $turnstileResponse = $request->request->get('cf-turnstile-response', '');

        // Sprawdź odpowiedź Turnstile
        if (!$this->verifyTurnstileResponse($turnstileResponse)) {
            throw new CustomUserMessageAuthenticationException('Weryfikacja CAPTCHA nie powiodła się. Spróbuj ponownie.');
        }

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', $csrfToken),
                new RememberMeBadge(),
            ]
        );
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
            throw new CustomUserMessageAuthenticationException('Błąd weryfikacji! Czy jesteś człowiekiem?');
        } 
    
        // Jeśli wszystko jest w porządku, zwróć true
        return true;
    }
    
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        if ($exception instanceof CustomUserMessageAuthenticationException) {
            // Dodaj wiadomość flash
            $request->getSession()->getFlashBag()->add('error', $exception->getMessageKey());
        }else {
            // Dla innych błędów autentykacji, możesz ustawić ogólną wiadomość
            $request->getSession()->getFlashBag()->add('error', 'Niepoprawne dane logowania!');
        }
    
        // Przekierowanie do strony logowania
        return new RedirectResponse($this->getLoginUrl($request));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // Przekieruj do strony głównej po pomyślnym uwierzytelnieniu
        return new RedirectResponse($this->urlGenerator->generate('app_main'));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}


