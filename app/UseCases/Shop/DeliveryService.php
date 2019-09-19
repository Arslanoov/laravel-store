<?php

namespace App\UseCases\Shop;

use App\Query\Shop\DeliveryMethod\Find\FindMethodsByWeightQuery;
use App\UseCases\Service;

class DeliveryService extends Service
{
    public function findDeliveryMethodsByWeight(int $weight)
    {
        $methods = $this->queryBus->query(new FindMethodsByWeightQuery($weight));
        return $methods;
    }
}