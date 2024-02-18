<?php

namespace App\Filter\Modifier\Factory;

use App\Filter\Modifier\DateRangeMultiplier;
use App\Filter\Modifier\PriceModifierInterface;

class PriceModifierFactory implements PriceModifierFactoryInterface
{

    public function create(string $modifierType): PriceModifierInterface
    {
        $modifierClassBasename = str_replace //esta funcion php remplaza caracteres por otro de una cadena Determinada
        ('_', '',
            ucwords($modifierType, '_'));//Esta funcion pone mayusculas a partir de un separador en especifico
        $modifier=self::PRICE_MODIFIER_NAMESPACE.$modifierClassBasename;//aqui se esta concatenando la constante definida en la clase interfaz, con la variable

        return new DateRangeMultiplier();
    }
}