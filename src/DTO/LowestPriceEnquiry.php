<?php

namespace App\DTO;

use App\Entity\Product;
use Symfony\Component\Serializer\Attribute\Ignore;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class LowestPriceEnquiry implements PriceEnquiryInterface
{
   // #[Assert\NotBlank]
 //   #[Assert\Positive(message: 'La cantidad debe ser positiva')]
    private int $quantity;
    #[Ignore]
    private Product $product;

    private ?int $promotionId;
  //  #[Assert\Positive]
    private ?int $price;
    private ?int $discountedPrice;
    private ?string $requestLocation;
    private ?string $voucherCode;
    private ?string $requestDate;
    private ?string $promotionName;



    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }


    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }


    /**
     * @return int|null
     */
    public function getDiscountedPrice(): ?int
    {
        return $this->discountedPrice;
    }

    /**
     * @param int|null $discountedPrice
     */
    public function setDiscountedPrice(?int $discountedPrice): void
    {
        $this->discountedPrice = $discountedPrice;
    }

    /**
     * @return int|null
     */
    public function getPromotionId(): ?int
    {
        return $this->promotionId;
    }

    /**
     * @param int|null $promotionId
     */
    public function setPromotionId(?int $promotionId): void
    {
        $this->promotionId = $promotionId;
    }

    /**
     * @return string|null
     */
    public function getRequestLocation(): ?string
    {
        return $this->requestLocation;
    }

    /**
     * @param string|null $requestLocation
     */
    public function setRequestLocation(?string $requestLocation): void
    {
        $this->requestLocation = $requestLocation;
    }

    /**
     * @return string|null
     */
    public function getVoucherCode(): ?string
    {
        return $this->voucherCode;
    }

    /**
     * @param string|null $voucherCode
     */
    public function setVoucherCode(?string $voucherCode): void
    {
        $this->voucherCode = $voucherCode;
    }

    /**
     * @return string|null
     */
    public function
    getRequestDate(): ?string
    {
        return $this->requestDate;
    }

    /**
     * @param string|null $requestDate
     */
    public function setRequestDate(?string $requestDate): void
    {
        $this->requestDate = $requestDate;
    }

    /**
     * @return string|null
     */
    public function getPromotionName(): ?string
    {
        return $this->promotionName;
    }

    /**
     * @param string|null $promotionName
     */
    public function setPromotionName(?string $promotionName): void
    {
        $this->promotionName = $promotionName;
   }
  public static function loadValidatorMetadata(ClassMetadata $metadata):void{
        $metadata->addPropertyConstraint('quantity',new Assert\Positive());
       $metadata->addPropertyConstraint('quantity',new Assert\NotBlank());
       $metadata->addPropertyConstraint('price',new Assert\Positive());
      $metadata->addPropertyConstraint('requestDate',new Assert\NotBlank());
      $metadata->addPropertyConstraint('requestDate',new Assert\Date());

   }
//
//    public function jsonSerialize(): mixed
//    {
//        return get_object_vars($this);
//    }
}