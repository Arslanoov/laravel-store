<?php

namespace App\Command\Shop\Order\DeliveryData\Set;

use App\Repository\Shop\Order\DeliveryDataRepository;
use App\Repository\Shop\Order\OrderRepository;

class CommandHandler
{
    private $deliveryDatas;
    private $orders;

    public function __construct(
        DeliveryDataRepository $deliveryDatas,
        OrderRepository $orders
    )
    {
        $this->deliveryDatas = $deliveryDatas;
        $this->orders = $orders;
    }

    public function __invoke(Command $command): void
    {
        $deliveryData = $this->deliveryDatas->create(
            $command->regionId,
            $command->code
        );

        $this->orders->setDeliveryDataInfo(
            $command->order,
            $deliveryData->id
        );
    }
}