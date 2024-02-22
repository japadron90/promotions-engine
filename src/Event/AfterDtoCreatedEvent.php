<?php

namespace App\Event;



use App\DTO\PromotionEnquireInterface;

class AfterDtoCreatedEvent //en esta version no existela clase event
{
public const NAME ='dto.created';

    public function __construct(protected PromotionEnquireInterface $dto)
    {
    }

    /**
     * @return PromotionEnquireInterface
     */
    public function getDto(): PromotionEnquireInterface
    {
        return $this->dto;
    }
}