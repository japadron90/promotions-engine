<?php

namespace App\Filter\Modifier\Factory;

use App\Filter\Modifier\PriceModifierInterface;

interface PriceModifierFactoryInterface

{
    const PRICE_MODIFIER_NAMESPACE="App\Filter\Modifier\\";//aqui estoy creando una constante para que accedan todas las clases hijas
public function create(String $modifierType):PriceModifierInterface;
}