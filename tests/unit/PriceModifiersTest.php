<?php

namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Entity\Promotion;
use App\Filter\Modifier\DateRangeMultiplier;
use App\Filter\Modifier\FixedPriceVoucher;
use App\Tests\ServiceTestCase;

class PriceModifiersTest extends ServiceTestCase
{
/**  @test */

public function DateRangeMultiplier_returns_a_correctly_modified_price():void{
//given
$enquiry=new LowestPriceEnquiry();
$enquiry->setQuantity(5);
$enquiry->setRequestDate('2022-11-27');

  $promotion= new Promotion();
    $promotion->setName('Black Friday half price sale');
    $promotion->setAdjustment(0.5);
    $promotion->setCriteria(["from"=>"2022-11-25","to"=>"2022-11-28"]);
    $promotion->setType('date_range_multiplaier');


    $dateRangeModified=new DateRangeMultiplier();
  //when
    $modifiedPrice=$dateRangeModified->modify(100,5,$promotion,$enquiry);

    //then
    $this->assertEquals(250,$modifiedPrice);
}
    /**  @test */
public function FixedPriceVoucher_returns_acorrectly_modified_price():void{
    $fixedPriceVoucher= new FixedPriceVoucher();


}
}