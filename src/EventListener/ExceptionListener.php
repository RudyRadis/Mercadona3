<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Routing\RouterInterface;
use App\Exception\CategoryNotFoundException;

class ExceptionListener
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        if ($exception instanceof CategoryNotFoundException) {
            $response = new RedirectResponse($this->router->generate('app_product_not_found'));
            $event->setResponse($response);
        }
    }
}