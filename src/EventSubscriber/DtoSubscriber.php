<?php

namespace App\EventSubscriber;


use App\DTO\LowestPriceEnquiry;
use App\Event\AfterDtoCreatedEvent;
use App\Service\ServiceException;
use App\Service\ServiceExceptionData;
use App\Service\ValidationExceptionData;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DtoSubscriber implements EventSubscriberInterface
{
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public static function getSubscribedEvents():array
    {
        return [AfterDtoCreatedEvent::NAME => 'validateDto'];
    }

    public function validateDto(AfterDtoCreatedEvent $event): void
    {
        $dto = $event->getDto();
        $errors = $this->validator->validate($dto);
        if (count($errors) > 0) {

            $validationExceptionData= new ServiceExceptionData(422,'ConstraintViolationList');

            throw new ServiceException($validationExceptionData);
        }

    }
    public function validateJuly(LowestPriceEnquiry $valor,ValidatorInterface $validator){
$errors=$validator->validate($valor);

if(count($errors)>0){
    $validationExceptionData= new ValidationExceptionData(422,'ConstraintViolationList',$errors);

    return new JsonResponse(throw new ServiceException($validationExceptionData));
  //  throw new ValidationFailedException('Validation Julio failed',$error);
 //   dd(1);
}
    }
}
