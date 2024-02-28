<?php

namespace App\EventListener;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();



        $response = new JsonResponse([
            'type' => 'ConstraintViolationList',
            'title' => 'An error occurred',
            'description' => 'This Value should be positive',
            'violations' => [
                ['propertyPath' => 'quantity',
                    'message' => 'This Value should be positive'
                ]
            ]
        ]);
        if($exception instanceof ValidationFailedException ){//HttpExceptionInterface

            $response->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
$event->setResponse($response);
    }
}