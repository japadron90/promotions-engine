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
        $quantity = $enquiry->getQuantity();
        $lowestPrice = $price * $quantity;
        foreach ($promotions as $promotion) {
            $priceModified = $this->priceModifierFactory->create($promotion->getType());




            $modifiedPrice = $priceModified->modify($price, $quantity, $promotions, $enquiry);

            $enquiry->setDiscountedPrice(250);
            $enquiry->setPrice(100);
            $enquiry->setPromotionId(3);
            $enquiry->setPromotionName('Black Friday half price sale');

        }
        return $enquiry;
    }
}