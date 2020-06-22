<?php

namespace App\Command\Admin\Shop\Order\Pay;

use App\Repository\Shop\Order\OrderRepository;

class CommandHandler
{
    private $orders;

    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

    public function __invoke(Command $command)
    {
        $this->orders->payByAdmin($command->order);
    }
}