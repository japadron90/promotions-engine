<?php

namespace App\Controller;

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
    public function lowestPrice(int $id,Request $request,SerializerInterface $serializer): Response{

        if($request->headers->has('force_fail')){
            return new JsonResponse(['error'=>'promotions Engine failure message'],$request->headers->get('force_fail'));

        }
        dd($serializer);
        return new JsonResponse([
            'quantity'=>5,
            'request_location'=>'UK',
            'voucher_code'=>'OU812',
            'request_date'=>'2024-02-04',
            'product_id'=>$id,
            'price'=>100,
            'discounted_price'=>50,
            'promotion_id'=>3,
            'promotion_name'=>'Black Friday half price sale'
        ],200);
        
        /*$encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
$tiempo= new \DateTime();
        $serializer = new Serializer($normalizers, $encoders);
$json=$serializer->serialize($tiempo,'json');
dd($json);*/
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
