<?php

namespace App\Repository\Shop\Order;

use App\Entity\Shop\Order\OrderItem;

class OrderItemRepository
{
    public function create(
        int $orderId, int $productId, string $productName,
        int $productPrice, int $productQuantity
    ): OrderItem
    {
        $orderItem = OrderItem::new(
            $orderId, $productId, $productName,
            $productPrice, $productQuantity
        );

        return $orderItem;
    }
}