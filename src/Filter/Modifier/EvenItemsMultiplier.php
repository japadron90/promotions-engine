<?php

namespace App\Filter\Modifier;

use App\DTO\PromotionEnquireInterface;
use App\Entity\Promotion;

class EvenItemsMultiplier implements PriceModifierInterface
{

    public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquireInterface $enquiry): int
    {
        if($quantity<2){
            return $price*$quantity;
        }
        $oddCount=$quantity%2;
        $evenCount=$quantity-$oddCount;

        return (($evenCount*$promotion->getAdjustment())*$price)+($oddCount*$price);
    }
}