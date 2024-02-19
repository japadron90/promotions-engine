<?php

namespace App\DTO;

interface PriceEnquiryInterface extends PromotionEnquireInterface
{
public function setPrice(int $price);
public function setDiscountedPrice(int $discoutendPrice);
public function getQuantity(): ?int;
}