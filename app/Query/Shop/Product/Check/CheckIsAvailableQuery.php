<?php

namespace App\Query\Shop\Product\Check;

use App\Entity\Shop\Cart\CartItem;

class CheckIsAvailableQuery
{
    public $productId;

    public function __construct(CartItem $cartItem)
    {
        $this->productId = $cartItem->product_id;
    }
}