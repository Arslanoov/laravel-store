<?php

namespace App\UseCases\Admin\Shop;

use App\Entity\Shop\DeliveryMethod;
use App\Http\Requests\Admin\Shop\DeliveryMethod\CreateRequest;
use App\Http\Requests\Admin\Shop\DeliveryMethod\UpdateRequest;
use App\Query\Shop\DeliveryMethod\Find\FindMethodsQuery;
use App\UseCases\Service;
use App\Command\Admin\Shop\DeliveryMethod\Create\Command as CreateDeliveryMethodCommand;
use App\Command\Admin\Shop\DeliveryMethod\Update\Command as UpdateDeliveryMethodCommand;
use App\Command\Admin\Shop\DeliveryMethod\Remove\Command as RemoveDeliveryMethodCommand;

class DeliveryMethodManageService extends Service
{
    public function create(CreateRequest $request)
    {
        $this->commandBus->handle(new CreateDeliveryMethodCommand($request));
    }

    public function update(UpdateRequest $request, DeliveryMethod $deliveryMethod)
    {
        $this->commandBus->handle(new UpdateDeliveryMethodCommand($request, $deliveryMethod));
    }

    public function remove(DeliveryMethod $deliveryMethod)
    {
        $this->commandBus->handle(new RemoveDeliveryMethodCommand($deliveryMethod));
    }

    public function getMethods()
    {
        $methods = $this->queryBus->query(new FindMethodsQuery());
        return $methods;
    }
}