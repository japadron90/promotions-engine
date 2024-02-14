<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use App\Entity\Promotion;
use App\Filter\PromotionFilterInterface;
use App\Repository\ProductRepository;
use App\Service\Serializer\DtoSerializer;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Context\Normalizer\DateTimeNormalizerContextBuilder;
use Symfony\Component\Serializer\SerializerInterface;

class ProductsController extends AbstractController


{
    public function __construct(private ProductRepository $repository,private EntityManagerInterface $entityManager)
    {

    }

    #[Route('/products/{id}/lowest-price', name: 'lowest-price',methods: 'POST')]
    public function lowestPrice(int $id,Request $request,DtoSerializer $serializer,PromotionFilterInterface $promotionFilter): Response{

        if($request->headers->has('force_fail')){
            return new JsonResponse(['error'=>'promotions Engine failure message'],$request->headers->get('force_fail'));

        }
      /** @var   LowestPriceEnquiry $lowestPriceEnquiry */
        $lowestPriceEnquiry=$serializer->deserialize($request->getContent(),LowestPriceEnquiry::class,'json');
$product=$this->repository->find($id);//Add error handling for not found product
      $lowestPriceEnquiry->setProduct($product);
       // dd($this->entityManager->getRepository(Promotion::class)->find(1));
      $promotion= $this->entityManager->getRepository(Promotion::class)->findValidForProduct(
          $product, date_create_immutable($lowestPriceEnquiry->getRequestDate())
      );


$modify=$promotionFilter->apply($lowestPriceEnquiry,...$promotion);

$responseContent=$serializer->serialize($modify,'json');
        return new Response($responseContent,200);


    }


    #[Route('/productos', name: 'app_products')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductsController.php',
        ]);
    }
    #[Route('/products/{id}/promotions', name: 'promotions',methods: 'GET')]
    public function promotions()
    {

    }



}
