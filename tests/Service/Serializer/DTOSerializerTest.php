<?php

namespace App\Tests\Service\Serializer;

use App\Service\Serializer\DTOSerializer;
use App\Tests\ServiceTestCase;

class DTOSerializerTest extends ServiceTestCase
{
    public function test_serialize()
    {
        //Given
        $array = ['name' => 'John', 'age' => 22];
        $DTOSerializer = $this->container->get(DTOSerializer::class);

        //When
        $serialized = $DTOSerializer->serialize($array);

        //Then
        $this->assertNotEmpty($serialized);
        $this->assertJson($serialized);
    }
}