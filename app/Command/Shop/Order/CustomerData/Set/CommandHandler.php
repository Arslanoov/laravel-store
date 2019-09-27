<?php

namespace App\Command\Shop\Order\CustomerData\Set;

use App\Repository\Shop\Order\CustomerDataRepository;
use App\Repository\Shop\Order\OrderRepository;

class CommandHandler
{
    private $customerDatas;
    private $orders;

    public function __construct(CustomerDataRepository $customerDatas, OrderRepository $orders)
    {
        $this->customerDatas = $customerDatas;
        $this->orders = $orders;
    }

    public function __invoke(Command $command)
    {
        $customerData = $this->customerDatas->create(
            $command->name,
            $command->surname,
            $command->patronymic,
            $command->email,
            $command->phone
        );

        $this->orders->setCustomerDataInfo(
            $command->order,
            $customerData->id
        );
    }
}