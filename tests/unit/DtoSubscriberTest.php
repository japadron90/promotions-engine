<?php

namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Event\AfterDtoCreatedEvent;
use App\Tests\ServiceTestCase;

use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class DtoSubscriberTest extends ServiceTestCase
{
    /** @test */
public function a_dto_is_validate_after_it_has_been_created():void{

    $dto=new LowestPriceEnquiry();
    $dto->setQuantity(-5);
    $event= new AfterDtoCreatedEvent($dto);
   /**@var EventDispatcherInterface $eventDispatcher*/
    $eventDispatcher=$this->container->get('debug.event_dispatcher');
    $this->expectException(ValidationFailedException::class);
    $this->expectExceptionMessage('this value is crazy');
    $eventDispatcher->dispatch($event,$event::NAME);


}
}