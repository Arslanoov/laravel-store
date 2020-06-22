<?php

namespace App\Command\Shop\Cart\Remove;

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
        if ($command->cartItem->user_id == $command->userId) {
            $this->carts->remove($command->cartItem);
        } else {
            abort(403);
        }
    }
}