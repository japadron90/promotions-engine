<?php

namespace App\Filter;



use App\DTO\PromotionEnquireInterface;

class LowestPriceFilter implements PromotionFilterInterface
{


    public function apply(PromotionEnquireInterface $enquiry): PromotionEnquireInterface
    {
        $enquiry->setDiscountedPrice(50);
        $enquiry->setPrice(100);
        $enquiry->setPromotionId(3);
        $enquiry->setPromotionName('Black Friday half price sale');
        return $enquiry;
    }
}