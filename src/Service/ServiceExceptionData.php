<?php

namespace App\Service;

class ServiceExceptionData
{

    public function __construct(protected int $statusCode,protected string $type)
    {

    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function toArray(): array
    {
        return [
            'type' => 'ConstraintViolationList',
            'title' => 'An error occurred',
            'description' => 'This Value should be positive',
            'violations' => [
                ['propertyPath' => 'quantity',
                    'message' => 'This Value should be positive'
                ]
            ]
        ];
    }
}