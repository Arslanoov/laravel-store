<?php

namespace App\Command\Shop\Cart\Add;

use App\Repository\Shop\Cart\CartItemRepository;

class CommandHandler
{
    private $carts;

    public function __construct(CartItemRepository $carts)
    {
        $this->carts = $carts;
    }

    public function __invoke(Command $command)
    {
        $this->carts->create(
            $command->product, $command->userId,
            $command->quantity
        );
    }
}