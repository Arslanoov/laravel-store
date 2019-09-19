<?php

namespace App\Services;

use App\Query\Shop\Cart\Find\FindCartItemByUserAndProductQuery;
use App\Query\Shop\Cart\Find\FindCartItemByUserIdQuery;
use App\UseCases\Service;
use App\Command\Shop\Cart\Add\Command as AddProductToCartCommand;
use App\Command\Shop\Cart\Remove\Command as RemoveCartProduct;
use App\Command\Shop\Cart\Increase\Command as IncreaseProductsCountCommand;

class CartService extends Service
{
    public function addItem($quantity, $product, $userId)
    {
        $cartItem = $this->queryBus->query(new FindCartItemByUserAndProductQuery($userId, $product->id));

        if ($cartItem) {
            $this->commandBus->handle(new IncreaseProductsCountCommand($cartItem, $quantity));
        } else {
            $this->commandBus->handle(new AddProductToCartCommand($quantity, $product, $userId));
        }
    }

    public function removeItem($cartItem, $userId)
    {
        $this->commandBus->handle(new RemoveCartProduct($cartItem, $userId));
    }

    public function removeAllItems($cartItems, $userId)
    {
        foreach ($cartItems as $cartItem) {
            $this->commandBus->handle(new RemoveCartProduct($cartItem, $userId));
        }
    }

    public function findCartItemsByUserId(int $userId)
    {
        $cartItem = $this->queryBus->query(new FindCartItemByUserIdQuery($userId));
        return $cartItem;
    }

    public function findCartItemsCountByUserId(int $userId): int
    {
        $itemsCount = $this->queryBus->query(new FindCartItemByUserIdQuery($userId));

        $sum = 0;
        foreach ($itemsCount as $itemCount) {
            $sum += $itemCount->quantity;
        }

        return $sum;
    }

    public function countTotalWeightByCartItems($cartItems)
    {
        $totalWeight = 0;

        foreach ($cartItems as $cartItem) {
            $totalWeight += $cartItem->total_weight;
        }

        return $totalWeight;
    }
}