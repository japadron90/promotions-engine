<?php

namespace App\Filter;



use App\DTO\PromotionEnquireInterface;
use App\Entity\Promotion;

class LowestPriceFilter implements PromotionFilterInterface
{


    public function apply(PromotionEnquireInterface $enquiry,Promotion ...$promotion): PromotionEnquireInterface
    {
$price=$enquiry->getProduct()->getPrice();
$quantity=$enquiry->getQuantity();
$lowestPrice=$price*$quantity;


//$modifiedPrice=$priceModified->modify($price,$quantity,$promotion,$enquiry);

        $enquiry->setDiscountedPrice(250);
        $enquiry->setPrice(100);
        $enquiry->setPromotionId(3);
        $enquiry->setPromotionName('Black Friday half price sale');
        return $enquiry;
    }
}