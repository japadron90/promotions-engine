<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'app_products')]
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
    #[Route('/products/{id}/lowest-price', name: 'lowest-price',methods: 'POST')]
    public function lowestprice(int $id){
        dd($id);

    }
}
