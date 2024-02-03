<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price',methods: 'POST')]
    public function lowestPrice(int $id){
$something= new \DateTime();
$serializer = new Serializer();
dd("holaaaa");
     /*   $contextBuilder = (new DateTimeNormalizerContextBuilder())->withFormat('Y-m-d H:i:s');
        $serializer->serialize($something, 'json', $contextBuilder->toArray());
        dd($serializer);
*/
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
