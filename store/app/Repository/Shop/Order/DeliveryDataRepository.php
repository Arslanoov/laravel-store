<?php

namespace App\Repository\Shop\Order;

use App\Entity\Shop\Order\DeliveryData;

class DeliveryDataRepository
{
    public function create(int $regionId, int $code): DeliveryData
    {
        $deliveryData = DeliveryData::new(
            $regionId, $code
        );

        return $deliveryData;
    }
}