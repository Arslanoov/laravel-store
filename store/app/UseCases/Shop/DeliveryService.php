<?php

namespace App\UseCases\Shop;

use App\Entity\Shop\DeliveryMethod;
use App\Query\Shop\DeliveryMethod\Find\FindByIdQuery;
use App\Query\Shop\DeliveryMethod\Find\FindMethodsByWeightQuery;
use App\UseCases\Service;

class DeliveryService extends Service
{
    public function findDeliveryMethodsByWeight(int $weight)
    {
        $methods = $this->queryBus->query(new FindMethodsByWeightQuery($weight));
        return $methods;
    }

    public function findById(int $id): ?DeliveryMethod
    {
        $deliveryMethod = $this->queryBus->query(new FindByIdQuery($id));
        return $deliveryMethod;
    }

    public function checkIsCorrectDeliveryMethod(
        DeliveryMethod $method, int $totalWeight
    ): bool
    {
        return $totalWeight < $method->max_weight;
    }
}