<?php

namespace App\Command\Shop\Order\DeliveryMethod\Set;

use App\Entity\Shop\DeliveryMethod;
use App\Entity\Shop\Order\Order;

class Command
{
    public $id;
    public $name;
    public $cost;

    public $order;

    public function __construct(DeliveryMethod $deliveryMethod, Order $order)
    {
        $this->id = $deliveryMethod->id;
        $this->name = $deliveryMethod->name;
        $this->cost = $deliveryMethod->cost;
        $this->order = $order;
    }
}