<?php

namespace App\Service\Serializer;

use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class DtoSerializer implements SerializerInterface
{
private SerializerInterface $serializer ;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct()
    {
       $this->serializer = new Serializer([new ObjectNormalizer()],[ new JsonEncoder()]);
    }

    public function serialize(mixed $data, string $format, array $context = []): string
    {
        return $this->serializer->serialize($data,$format,$context);
    }

    public function deserialize(mixed $data, string $type, string $format, array $context = []): mixed
    {
        return $this->serializer->deserialize($data,$type,$format,$context);
    }
}