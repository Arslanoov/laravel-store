<?php

namespace App\Command\Shop\Order\OrderItem\Create;

use App\Repository\Shop\Order\OrderItemRepository;
use App\Repository\Shop\Product\ProductRepository;

class CommandHandler
{
    private $orderItems;
    private $products;

    public function __construct(
        OrderItemRepository $orderItems,
        ProductRepository $products
    )
    {
        $this->orderItems = $orderItems;
        $this->products = $products;
    }

    public function __invoke(Command $command)
    {
        $orderItem = $this->orderItems->create(
            $command->orderId,
            $command->productId,
            $command->productName,
            $command->productPrice,
            $command->productQuantity
        );

        $this->products->reduceQuantity($orderItem->product);
    }
}