<?php

namespace App\Command\Shop\Cart\Increase;

use App\Entity\Shop\Cart\CartItem;

class Command
{
    public $cartItem;

    public function __construct(CartItem $cartItem)
    {
        $this->cartItem = $cartItem;
    }
}