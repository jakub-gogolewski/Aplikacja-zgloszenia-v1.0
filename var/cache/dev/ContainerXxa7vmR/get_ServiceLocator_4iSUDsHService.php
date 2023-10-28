<?php

namespace ContainerXxa7vmR;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_4iSUDsHService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.4iSUDsH' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.4iSUDsH'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'authenticationUtils' => ['privates', 'security.authentication_utils', 'getSecurity_AuthenticationUtilsService', true],
            'tokenStorage' => ['privates', 'security.token_storage', 'getSecurity_TokenStorageService', false],
        ], [
            'authenticationUtils' => '?',
            'tokenStorage' => '?',
        ]);
    }
}
