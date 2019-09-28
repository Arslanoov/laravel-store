<?php

namespace App\Repository\Shop\Order;

use App\Entity\Shop\Order\Order;

class OrderRepository
{
    public function create($userId, $note, $totalPrice): Order
    {
        $order = Order::new($userId, $note, $totalPrice);
        return $order;
    }

    public function setDeliveryMethodInfo(Order $order, int $id, string $name, int $cost): void
    {
        $order->setDeliveryMethodInfo($id, $name, $cost);
    }

    public function setCustomerDataInfo(Order $order, int $customerDataId): void
    {
        $order->setCustomerDataInfo($customerDataId);
    }

    public function setDeliveryDataInfo(Order $order, int $deliveryDataId): void
    {
        $order->setDeliveryDataInfo($deliveryDataId);
    }

    public function payByAdmin(Order $order): void
    {
        $order->pay('Paid by Admin');
    }

    public function makeSent(Order $order): void
    {
        $order->send();
    }

    public function makeCompleted(Order $order): void
    {
        $order->complete();
    }

    public function cancelByAdmin(Order $order, $reason): void
    {
        $order->cancelByAdmin($reason);
    }

    public function cancelByUser(Order $order, $reason): void
    {
        $order->cancelByUser($reason);
    }

    public function remove(Order $order): void
    {
        $order->delete();
    }
}