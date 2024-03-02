<?php

namespace App\Service;

use Symfony\Component\Validator\ConstraintViolationList;

class ValidationExceptionData extends ServiceExceptionData
{
    private ConstraintViolationList $violations;

    public function __construct(int $statusCode, string $type, ConstraintViolationList $violations)
{
    $this->statusCode = $statusCode;
    $this->type = $type;
    parent::__construct($statusCode,$type);

    $this->violations = $violations;
}

    public function toArray(): array
    {
        return [
            'type' =>$this->type,
              'violations' => $this->getViolationsArray()

        ];
    }
    public function getViolationsArray():array{
    $arrayMessage=[];
    foreach ($this->violations as $violation){
        $arrayMessage[]=[
            'propertyPath' => $violation->getPropertyPath(),
            'message' => $violation->getMessage()
        ];

    }
    return $arrayMessage;
    }

}