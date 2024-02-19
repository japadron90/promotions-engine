<?php

namespace App\Filter;


use App\DTO\PromotionEnquireInterface;
use App\Entity\Promotion;
use App\Filter\Modifier\Factory\PriceModifierFactoryInterface;

class LowestPriceFilter implements PromotionFilterInterface
{


    public function __construct(private PriceModifierFactoryInterface $priceModifierFactory)
    {
    }

    public function apply(PromotionEnquireInterface $enquiry, Promotion ...$promotions): PromotionEnquireInterface
    {
        $price = $enquiry->getProduct()->getPrice();
        $enquiry->setPrice($price);
        $quantity = $enquiry->getQuantity();
        $lowestPrice = $price * $quantity;
        foreach ($promotions as $promotion) {
            $priceModified = $this->priceModifierFactory->create($promotion->getType());




            $modifiedPrice = $priceModified->modify($price, $quantity, $promotion, $enquiry);
       if($modifiedPrice<$lowestPrice){

            $enquiry->setDiscountedPrice($modifiedPrice);

            $enquiry->setPromotionId($promotion->getId());
            $enquiry->setPromotionName($promotion->getName());
            $lowestPrice=$modifiedPrice;
       }
        }
        return $enquiry;
    }
}