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
}