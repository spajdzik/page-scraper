<?php

namespace App\Service\Exception;

class ExceptionData
{

    public function __construct(
        protected int $statusCode,
        protected string $type
    )
    {
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
            'code' => $this->statusCode,
            'message' => $this->type,
        ];
    }
}