<?php

namespace ContainerN1Rnn7r;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTestControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\TestController' shared autowired service.
     *
     * @return \App\Controller\TestController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/TestController.php';

        $container->services['App\\Controller\\TestController'] = $instance = new \App\Controller\TestController();

        $instance->setContainer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'form.factory' => ['privates', 'form.factory', 'getForm_FactoryService', true],
            'http_kernel' => ['services', 'http_kernel', 'getHttpKernelService', false],
            'parameter_bag' => ['privates', 'parameter_bag', 'getParameterBagService', false],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'router' => ['services', 'router', 'getRouterService', false],
            'twig' => ['privates', 'twig', 'getTwigService', true],
        ], [
            'form.factory' => '?',
            'http_kernel' => '?',
            'parameter_bag' => '?',
            'request_stack' => '?',
            'router' => '?',
            'twig' => '?',
        ]))->withContext('App\\Controller\\TestController', $container));

        return $instance;
    }
}
