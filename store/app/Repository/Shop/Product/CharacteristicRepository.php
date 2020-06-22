<?php

namespace App\Repository\Shop\Product;

use App\Entity\Shop\Product\Characteristic;

class CharacteristicRepository
{
    public function create(
        int $productId,
        int $characteristicId
    ): Characteristic
    {
        $characteristic = Characteristic::new(
            $productId,
            $characteristicId
        );

        return $characteristic;
    }

    public function addVariant(
        Characteristic $characteristic,
        int $variantId
    ): void
    {
        $characteristic->addVariant($variantId);
    }

    public function remove(Characteristic $characteristic): void
    {
        $characteristic->delete();
    }
}