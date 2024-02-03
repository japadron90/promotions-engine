<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Context\Normalizer\DateTimeNormalizerContextBuilder;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price',methods: 'GET')]
    public function lowestPrice(int $id){
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
$tiempo= new \DateTime();
        $serializer = new Serializer($normalizers, $encoders);
$json=$serializer->serialize($tiempo,'json');
dd($json);
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
