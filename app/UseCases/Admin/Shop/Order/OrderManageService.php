<?php

namespace App\UseCases\Admin\Shop\Order;

use App\Entity\Shop\Order\Order;
use App\Http\Requests\Admin\Shop\Order\CancelRequest;
use App\Query\Shop\Order\Find\FindOrdersQuery;
use App\UseCases\Service;
use App\Command\Admin\Shop\Order\Pay\Command as OrderPayCommand;
use App\Command\Admin\Shop\Order\Send\Command as OrderSentCommand;
use App\Command\Admin\Shop\Order\Complete\Command as OrderCompleteCommand;
use App\Command\Admin\Shop\Order\Remove\Command as OrderRemoveCommand;
use App\Command\Admin\Shop\Order\Cancel\Command as OrderCancelCommand;

class OrderManageService extends Service
{
    public function makePaid(Order $order)
    {
        $this->commandBus->handle(new OrderPayCommand($order));
    }

    public function makeSent(Order $order)
    {
        $this->commandBus->handle(new OrderSentCommand($order));
    }

    public function makeCompleted(Order $order)
    {
        $this->commandBus->handle(new OrderCompleteCommand($order));
    }

    public function cancel(CancelRequest $request, Order $order)
    {
        $this->commandBus->handle(new OrderCancelCommand($order, $request));
    }

    public function remove(Order $order)
    {
        $this->commandBus->handle(new OrderRemoveCommand($order));
    }

    public function getOrders()
    {
        $orders = $this->queryBus->query(new FindOrdersQuery());
        return $orders;
    }
}