<?php

namespace App\ReadRepository\Shop\Characteristic;

use App\Entity\Shop\Characteristic\Variant;

class VariantReadRepository
{
    public function findByCharacteristicId($id)
    {
        $variants = Variant::where('characteristic_id', $id)->get();
        return $variants;
    }
}