<?php

namespace App\Command\Admin\Shop\DeliveryMethod\Remove;

use App\Entity\Shop\DeliveryMethod;

class Command
{
    public $deliveryMethod;

    public function __construct(DeliveryMethod $deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod;
    }
}