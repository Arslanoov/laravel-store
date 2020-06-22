<?php

namespace App\Command\Shop\Cart\Add;

use App\Entity\Shop\Product\Product;

class Command
{
    public $userId;
    public $quantity;
    public $product;

    public function __construct($quantity, Product $product, int $userId)
    {
        $this->userId = $userId;
        $this->quantity = $quantity;
        $this->product = $product;
    }
}