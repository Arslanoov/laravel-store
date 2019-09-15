<?php

namespace App\UseCases\Admin\Shop\Characteristic;

use App\Entity\Shop\Characteristic\Characteristic;
use App\Entity\Shop\Characteristic\Variant;
use App\Http\Requests\Admin\Shop\Characteristic\Variant\CreateRequest;
use App\Http\Requests\Admin\Shop\Characteristic\Variant\UpdateRequest;
use App\Command\Admin\Shop\Characteristic\Variant\Create\Command as VariantCreateCommand;
use App\Command\Admin\Shop\Characteristic\Variant\Update\Command as VariantUpdateCommand;
use App\Command\Admin\Shop\Characteristic\Variant\Remove\Command as VariantRemoveCommand;
use App\Query\Shop\Characteristic\Variant\Find\FindVariantsByCharacteristicIdQuery;
use App\UseCases\Service;

class VariantManageService extends Service
{
    public function create(CreateRequest $request, Characteristic $characteristic)
    {
        $this->commandBus->handle(new VariantCreateCommand($request, $characteristic));
    }

    public function update(UpdateRequest $request, Variant $variant)
    {
        $this->commandBus->handle(new VariantUpdateCommand($request, $variant));
    }

    public function remove(Variant $variant)
    {
        $this->commandBus->handle(new VariantRemoveCommand($variant));
    }

    public function getVariantsByCharacteristic($characteristic)
    {
        $variants = $this->queryBus->query(new FindVariantsByCharacteristicIdQuery($characteristic->id));
        return $variants;
    }
}