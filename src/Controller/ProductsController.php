<?php

namespace App\Controller;

use App\cache\PromotionCache;
use App\DTO\LowestPriceEnquiry;
use App\Entity\Promotion;
use App\EventSubscriber\DtoSubscriber;
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
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductsController extends AbstractController


{
    public function __construct(private ProductRepository $repository,)
    {

    }

    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: 'POST')]
    public function lowestPrice(int $id, Request $request, DtoSerializer $serializer, DtoSubscriber $subscriber, PromotionFilterInterface $promotionFilter, PromotionCache $promotionCache, ValidatorInterface $validator): Response
    {


        /** @var   LowestPriceEnquiry $lowestPriceEnquiry */


        $lowestPriceEnquiry = $serializer->deserialize($request->getContent(), LowestPriceEnquiry::class, 'json');
        $subscriber->validateJuly($lowestPriceEnquiry, $validator);

        $product = $this->repository->findOrFail($id);//Add error handling for not found product
        $lowestPriceEnquiry->setProduct($product);

        $promotion = $promotionCache->findValidForProduct($product, $lowestPriceEnquiry->getRequestDate());//la idea aki es guardar en cache

        $modify = $promotionFilter->apply($lowestPriceEnquiry, ...$promotion);

        $responseContent = $serializer->serialize($modify, 'json');

        return new JsonResponse(data: $responseContent,status: Response::HTTP_OK,json: true);
       // return new Response($responseContent, 200, ['Content-Type' => 'application/json']);


    }


    #[Route('/productos', name: 'app_products')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductsController.php',
        ]);
    }

    #[Route('/products/{id}/promotions', name: 'promotions', methods: 'GET')]
    public function promotions()
    {

    }


}
