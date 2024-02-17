<?php

namespace App\Filter\Modifier;


use App\DTO\PromotionEnquireInterface;
use App\Entity\Promotion;

interface PriceModifierInterface
{
public function modify(int $price,int $quantity,Promotion $promotion,PromotionEnquireInterface $enquiry):int;
}