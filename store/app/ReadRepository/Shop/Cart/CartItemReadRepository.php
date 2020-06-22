<?php

namespace App\ReadRepository\Shop\Cart;

use App\Entity\Shop\Cart\CartItem;

class CartItemReadRepository
{
    public function findByUserId(int $userId)
    {
        $cartItem = CartItem::where('user_id', $userId)->get();
        return $cartItem;
    }
    public function findByUserAndProduct(int $userId, int $productId)
    {
        $cartItem = CartItem::where('user_id', $userId)->where('product_id', $productId)->first();
        return $cartItem;
    }
}