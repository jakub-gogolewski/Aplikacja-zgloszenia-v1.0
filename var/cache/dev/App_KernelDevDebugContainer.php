<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerASYIuI5\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerASYIuI5/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerASYIuI5.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerASYIuI5\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerASYIuI5\App_KernelDevDebugContainer([
    'container.build_hash' => 'ASYIuI5',
    'container.build_id' => '787ec886',
    'container.build_time' => 1698484699,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerASYIuI5');
