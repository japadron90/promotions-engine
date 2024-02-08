<?php

namespace App\Filter;

use App\DTO\PromotionEnquireInterface;

interface PromotionFilterInterface
{
public function apply(PromotionEnquireInterface $enquiry):PromotionEnquireInterface;
}