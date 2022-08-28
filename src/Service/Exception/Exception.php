<?php

namespace App\Service\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

class Exception extends HttpException
{
    private ExceptionData $exceptionData;

    public function __construct(ExceptionData $exceptionData)
    {
        parent::__construct($exceptionData->getStatusCode(), $exceptionData->getType());

        $this->exceptionData = $exceptionData;
    }

    public function getExceptionData(): ExceptionData
    {
        return $this->exceptionData;
    }
}