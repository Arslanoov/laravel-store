<?php

namespace App\Command\Cabinet\Order\Cancel;

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
        if ($command->order->user->id == $command->userId) {
            $this->orders->cancelByUser(
                $command->order,
                $command->reason
            );
        }
    }
}