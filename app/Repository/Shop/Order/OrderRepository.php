<?php

namespace App\Repository\Shop\Order;

use App\Entity\Shop\Order\Order;

class OrderRepository
{
    public function create(
        $userId, $note,
        $totalPrice
    ): Order
    {
        $order = Order::new(
            $userId, $note,
            $totalPrice
        );

        return $order;
    }

    public function setDeliveryMethodInfo(
        Order $order,
        int $id,
        string $name,
        int $cost
    ): void
    {
        $order->setDeliveryMethodInfo(
            $id, $name, $cost
        );
    }

    public function setCustomerDataInfo(
        Order $order, int $customerDataId
    ): void
    {
        $order->setCustomerDataInfo($customerDataId);
    }

    public function setDeliveryDataInfo(
        Order $order, int $deliveryDataId
    ): void
    {
        $order->setDeliveryDataInfo($deliveryDataId);
    }

    public function cancel(Order $order, $reason): void
    {
        $order->cancelByUser($reason);
    }
}