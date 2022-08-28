<?php
namespace App\Tests\Service\Exception;

use App\Tests\ServiceTestCase;
use App\Service\Exception\ExceptionData;

class ExceptionDataTest extends ServiceTestCase
{
    public function test_exception_data()
    {
        //Given
        $statusCode = 500;
        $message = 'Error occurred';
        $exceptionData = new ExceptionData($statusCode, $message);

        //When

        //Then
        $this->assertSame($statusCode, $exceptionData->getStatusCode());
        $this->assertSame($message, $exceptionData->getMessage());

        $this->assertIsArray($exceptionData->toArray());
        $this->assertArrayHasKey('code', $exceptionData->toArray());
        $this->assertArrayHasKey('message', $exceptionData->toArray());

        $this->assertSame($statusCode, $exceptionData->toArray()['code']);
        $this->assertSame($message, $exceptionData->toArray()['message']);
    }
}