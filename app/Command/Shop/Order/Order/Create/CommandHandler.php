<?php

namespace App\Command\Shop\Order\Order\Create;

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
        $order = $this->orders->create(
            $command->userId,
            $command->note,
            $command->totalPrice
        );

        return $order;
    }
}