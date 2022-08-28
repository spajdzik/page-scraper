<?php
namespace App\Tests\Service\Exception;

use App\Service\Exception\ExceptionData;
use App\Tests\ServiceTestCase;
use App\Service\Exception\Exception;

class ExceptionTest extends ServiceTestCase
{
    public function test_exception_data()
    {
        //Given
        $statusCode = 500;
        $message = 'Error occurred';
        $exceptionData = new ExceptionData($statusCode, $message);
        $exception = new Exception($exceptionData);
        //When

        //Then
        $this->assertIsObject($exception->getExceptionData());
        $this->assertObjectHasAttribute('exceptionData', $exception);
        
        $this->assertObjectHasAttribute('statusCode', $exception->getExceptionData());
        $this->assertObjectHasAttribute('message', $exception->getExceptionData());
    }
}