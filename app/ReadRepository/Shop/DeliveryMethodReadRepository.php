<?php

namespace App\ReadRepository\Shop;

use App\Entity\Shop\DeliveryMethod;

class DeliveryMethodReadRepository
{
    public function findAll()
    {
        $methods = DeliveryMethod::orderByDesc('id');
        return $methods;
    }

    public function findByWeight(int $weight)
    {
        $methods = DeliveryMethod::orderBy('sort')
            ->where('max_weight', '>', $weight)
            ->get();

        return $methods;
    }
}