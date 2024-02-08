<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use App\Service\Serializer\DtoSerializer;
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
    #[Route('/products/{id}/lowest-price', name: 'lowest-price',methods: 'POST')]
    public function lowestPrice(int $id,Request $request,DtoSerializer $serializer): Response{

        if($request->headers->has('force_fail')){
            return new JsonResponse(['error'=>'promotions Engine failure message'],$request->headers->get('force_fail'));

        }
      /** @var   LowestPriceEnquiry $lowestPriceEnquiry */
        $lowestPriceEnquiry=$serializer->deserialize($request->getContent(),LowestPriceEnquiry::class,'json');


        return new Response($serializer->serialize($lowestPriceEnquiry,'json'),200);


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
