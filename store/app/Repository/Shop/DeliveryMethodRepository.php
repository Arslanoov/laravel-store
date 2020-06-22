<?php

namespace App\Repository\Shop;

use App\Entity\Shop\DeliveryMethod;

class DeliveryMethodRepository
{
    public function create(
        string $name, int $cost,
        int $minWeight, int $maxWeight,
        int $sort
    ): DeliveryMethod
    {
        $method = DeliveryMethod::new(
            $name, $cost, $minWeight,
            $maxWeight, $sort
        );

        return $method;
    }

    public function update(
        DeliveryMethod $deliveryMethod,
        string $name, int $cost,
        int $minWeight, int $maxWeight,
        int $sort
    ): void
    {
        $deliveryMethod->update([
            'name' => $name,
            'cost' => $cost,
            'min_weight' => $minWeight,
            'max_weight' => $maxWeight,
            'sort' => $sort
        ]);
    }

    public function remove(DeliveryMethod $deliveryMethod): void
    {
        $deliveryMethod->delete();
    }
}