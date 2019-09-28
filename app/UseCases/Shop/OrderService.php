<?php

namespace App\UseCases\Shop;

use App\Entity\Shop\DeliveryMethod;
use App\Entity\Shop\Order\Order;
use App\Entity\User\User;
use App\Http\Requests\Cabinet\Order\CancelRequest;
use App\Http\Requests\Shop\Order\CheckoutRequest;
use App\Query\Cabinet\Order\Find\FindByUserIdAndIdQuery;
use App\Query\Shop\Order\Find\FindByIdQuery;
use App\UseCases\Service;
use App\Command\Shop\Order\Order\Create\Command as OrderCreateCommand;
use App\Command\Shop\Order\DeliveryMethod\Set\Command as SetDeliveryMethodCommand;
use App\Command\Shop\Order\CustomerData\Set\Command as SetCustomerDataCommand;
use App\Command\Shop\Order\DeliveryData\Set\Command as SetDeliveryDataCommand;
use App\Command\Shop\Order\OrderItem\Create\Command as CreateOrderItemCommand;
use App\Command\Cabinet\Order\Cancel\Command as CancelOrderCommand;
use App\Query\Shop\Product\Check\CheckIsAvailableQuery;
use App\Command\Shop\Order\Order\Pay\Command as PayOrderCommand;

class OrderService extends Service
{
    public function checkout(
        CheckoutRequest $request,
        DeliveryMethod $deliveryMethod,
        User $user, int $totalPrice
    ): Order
    {
        $order = $this->commandBus->handle(new OrderCreateCommand($request, $user->id, $totalPrice));
        $this->commandBus->handle(new SetDeliveryMethodCommand($deliveryMethod, $order));
        $this->commandBus->handle(new SetCustomerDataCommand($order, $user));
        $this->commandBus->handle(new SetDeliveryDataCommand($request, $order, $user));
        return $order;
    }

    public function createOrderItems($orderItems, int $orderId): void
    {
        foreach ($orderItems as $orderItem) {
            $isAvailable = $this->queryBus->query(new CheckIsAvailableQuery($orderItem));
            if ($isAvailable) {
                $this->commandBus->handle(new CreateOrderItemCommand($orderItem, $orderId));
            }
        }
    }

    public function pay(Order $order): void
    {
        $this->commandBus->handle(new PayOrderCommand($order, 'Freekassa'));
    }

    public function cancel(Order $order, User $user, CancelRequest $request): void
    {
        $this->commandBus->handle(new CancelOrderCommand($order, $user, $request));
    }

    public function findOwn(int $userId, int $id): ?Order
    {
        $order = $this->queryBus->query(new FindByUserIdAndIdQuery($id, $userId));
        return $order;
    }

    public function findById(int $id): ?Order
    {
        $order = $this->queryBus->query(new FindByIdQuery($id));
        return $order;
    }

    public function countTotalPrice(int $subtotalPrice, DeliveryMethod $delivery): int
    {
        return $delivery->price + $subtotalPrice;
    }
}