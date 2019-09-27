<?php

namespace App\Command\Shop\Order\DeliveryMethod\Set;

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
        $this->orders->setDeliveryMethodInfo(
            $command->order,
            $command->id,
            $command->name,
            $command->cost
        );
    }
}