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
            $product->price, $product->weight,
            $quantity
        );

        return $cartItem;
    }

    public function remove(CartItem $cartItem): void
    {
        $cartItem->delete();
    }

    public function increaseProductsCount(CartItem $cartItem, int $quantity = 1): void
    {
        $cartItem->increaseProductsCount($quantity);
    }

    public function recountTotalPrice(CartItem $cartItem): void
    {
        $cartItem->recountTotalPrice();
    }

    public function recountTotalWeight(CartItem $cartItem): void
    {
        $cartItem->recountTotalWeight();
    }
}