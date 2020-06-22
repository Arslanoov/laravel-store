<?php

namespace App\Command\Shop\Cart\Remove;

use App\Entity\Shop\Cart\CartItem;

class Command
{
    public $cartItem;
    public $userId;

    public function __construct(CartItem $cartItem, int $userId)
    {
        $this->cartItem = $cartItem;
        $this->userId = $userId;
    }
}