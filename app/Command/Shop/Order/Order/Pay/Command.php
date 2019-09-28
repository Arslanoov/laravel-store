<?php

namespace App\Command\Shop\Order\Order\Pay;

use App\Entity\Shop\Order\Order;

class Command
{
    public $order;
    public $method;

    public function __construct(Order $order, $method)
    {
        $this->order = $order;
        $this->method = $method;
    }
}