<?php

namespace App\Tests\unit;



use App\Filter\LowestPriceFilter;
use App\Tests\ServiceTestCase;

class LowestPriceFilterTest extends ServiceTestCase
{
    /**@test */
public function testlowest_price_promotions_filtering_is_aplied_correctly():void{

    //given
$lowestPriceFilter=$this->container->get(LowestPriceFilter::class);
   dd($lowestPriceFilter);
    //when
    $filteredEnquery=$lowestPriceFilter->apply($enquiry,...$promotions);
    //then
    $this->assertSame(100,$filteredEnquery->getPrice());
    $this->assertSame(50,$filteredEnquery->getDiscountedPrice());
    $this->assertSame('Black Friday half price sale',$filteredEnquery->getPromotionName());
}
}