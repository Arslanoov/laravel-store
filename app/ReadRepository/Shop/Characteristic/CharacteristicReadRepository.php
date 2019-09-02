<?php

namespace App\ReadRepository\Shop\Characteristic;

use App\Entity\Shop\Characteristic\Characteristic;

class CharacteristicReadRepository
{
    public function findAll()
    {
        $characteristics = Characteristic::orderByDesc('id');
        return $characteristics;
    }
}