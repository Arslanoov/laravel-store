<?php

namespace App\Command\Shop\Order\OrderItem\Create;

use App\Entity\Shop\Cart\CartItem;

class Command
{
    public $orderId;
    public $productId;
    public $productName;
    public $productPrice;
    public $productQuantity;

    public function __construct(CartItem $cartItem, int $orderId)
    {
        $this->orderId = $orderId;
        $this->productId = $cartItem->product_id;
        $this->productName = $cartItem->product->title;
        $this->productPrice = $cartItem->product->price;
        $this->productQuantity = $cartItem->quantity;
    }
}