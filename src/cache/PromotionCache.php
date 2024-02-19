<?php

namespace App\cache;



use App\DTO\LowestPriceEnquiry;
use App\DTO\PriceEnquiryInterface;
use App\Entity\Product;
use App\Repository\PromotionRepository;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class PromotionCache
{
private $cache;
private $repository;
    public function __construct(CacheInterface $cache,PromotionRepository $repository)
    {
        $this->cache=$cache;
        $this->repository=$repository;
    }
    public function findValidForProduct(Product $product,string  $requestDate):?array{
        $key=sprintf("find-valid-for-product-%d",$product->getId());
     return $this->cache->get($key,function (ItemInterface $item) use ($product,$requestDate){
           var_dump('miss');
           $item->expiresAfter(3600);
          return $this->repository->findValidForProduct($product,date_create_immutable($requestDate));


       });
    }
}