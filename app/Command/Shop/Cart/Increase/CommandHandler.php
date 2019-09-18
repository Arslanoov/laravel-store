<?php

namespace App\Command\Shop\Cart\Increase;

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
        $this->carts->increaseProductsCount($command->cartItem, $command->quantity);
        $this->carts->recountTotal($command->cartItem);
    }
}