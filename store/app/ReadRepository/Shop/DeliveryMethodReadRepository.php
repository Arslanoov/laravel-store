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

    public function findById(int $id): ?DeliveryMethod
    {
        $method = DeliveryMethod::findOrFail($id);
        return $method;
    }

    public function findByWeight(int $weight)
    {
        $methods = DeliveryMethod::orderBy('sort')
            ->where('max_weight', '>', $weight)
            ->get();

        return $methods;
    }
}