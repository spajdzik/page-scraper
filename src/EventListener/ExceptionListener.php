<?php

namespace App\EventListener;

use App\Service\Exception\Exception;
use App\Service\Exception\ExceptionData;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof Exception) {
            $exceptionData = $exception->getExceptionData();
        } else {
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
            $exceptionData = new ExceptionData($statusCode, $exception->getMessage());
        }

        $response = new JsonResponse($exceptionData->toArray());
        $event->setResponse($response);
    }
}