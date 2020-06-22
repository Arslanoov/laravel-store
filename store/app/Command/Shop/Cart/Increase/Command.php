<?php

namespace App\Command\Shop\Cart\Increase;

use App\Entity\Shop\Cart\CartItem;

class Command
{
    public $cartItem;
    public $quantity;

    public function __construct(CartItem $cartItem, int $quantity)
    {
        $this->cartItem = $cartItem;
        $this->quantity = $quantity;
    }
}