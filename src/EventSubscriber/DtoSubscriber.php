<?php

namespace App\EventSubscriber;


use App\DTO\LowestPriceEnquiry;
use App\Event\AfterDtoCreatedEvent;
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
            throw new ValidationFailedException('Validation failed', $errors);
        }

    }
    public function validateJuly(LowestPriceEnquiry $valor,ValidatorInterface $validator){
$error=$validator->validate($valor);

if(count($error)>0){
    return new JsonResponse(throw new ValidationFailedException('Validation Julio failed',$error));
  //  throw new ValidationFailedException('Validation Julio failed',$error);
 //   dd(1);
}
    }
}
