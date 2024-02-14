<?php

namespace App\Filter;

use App\DTO\PromotionEnquireInterface;
use App\Entity\Promotion;

interface PromotionFilterInterface
{
public function apply(PromotionEnquireInterface $enquiry,Promotion ...$promotion):PromotionEnquireInterface;
}