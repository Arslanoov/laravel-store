<?php

namespace App\ReadRepository\Shop\Product;

use App\Entity\Shop\Characteristic\Characteristic;

class CharacteristicReadRepository
{
    public function findAll()
    {
        $characteristics = Characteristic::orderByDesc('id')->get();
        return $characteristics;
    }
}