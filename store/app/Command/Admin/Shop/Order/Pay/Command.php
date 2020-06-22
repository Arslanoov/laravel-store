<?php

namespace App\Command\Admin\Shop\Order\Pay;

use App\Entity\Shop\Order\Order;

class Command
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}