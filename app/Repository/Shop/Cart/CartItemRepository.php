<?php

namespace App\Repository\Shop\Cart;

use App\Entity\Shop\Cart\CartItem;
use App\Entity\Shop\Product\Product;

class CartItemRepository
{
    public function create(
        Product $product,
        int $userId, int $quantity
    ): CartItem
    {
        $cartItem = CartItem::new(
            $userId, $product->id,
            $product->price, $quantity
        );

        return $cartItem;
    }

    public function remove(CartItem $cartItem): void
    {
        $cartItem->delete();
    }

    public function increaseProductsCount(CartItem $cartItem): void
    {
        $cartItem->increaseProductsCount();
    }

    public function recountTotal(CartItem $cartItem): void
    {
        $cartItem->recountTotal();
    }
}