<?php

namespace App\UseCases\Admin\Shop\Characteristic;

use App\Command\CommandBus;
use App\Query\QueryBus;
use App\Http\Requests\Admin\Shop\Characteristic\Characteristic\CreateRequest;
use App\Http\Requests\Admin\Shop\Characteristic\Characteristic\UpdateRequest;
use App\Entity\Shop\Characteristic\Characteristic;
use App\Command\Admin\Shop\Characteristic\Characteristic\Create\Command as CharacteristicCreateCommand;
use App\Command\Admin\Shop\Characteristic\Characteristic\Update\Command as CharacteristicUpdateCommand;
use App\Command\Admin\Shop\Characteristic\Characteristic\Remove\Command as CharacteristicRemoveCommand;
use App\Query\Shop\Characteristic\Characteristic\Find\FindCharacteristicsQuery;
use App\Query\Shop\Characteristic\Characteristic\GetTypesListQuery;
use App\Query\Shop\Characteristic\Variant\Find\FindVariantsByCharacteristicIdQuery;

class CharacteristicManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(CreateRequest $request): void
    {
        $this->commandBus->handle(new CharacteristicCreateCommand($request));
    }

    public function update(UpdateRequest $request, Characteristic $characteristic): void
    {
        $this->commandBus->handle(new CharacteristicUpdateCommand($request, $characteristic));
    }

    public function remove(Characteristic $characteristic): void
    {
        $this->commandBus->handle(new CharacteristicRemoveCommand($characteristic));
    }

    public function getCharacteristics()
    {
        $characteristics = $this->queryBus->query(new FindCharacteristicsQuery());
        return $characteristics;
    }

    public function getTypes(): array
    {
        $types = $this->queryBus->query(new GetTypesListQuery());
        return $types;
    }

    public function getVariantsByCharacteristic($characteristic)
    {
        $variants = $this->queryBus->query(new FindVariantsByCharacteristicIdQuery($characteristic->id));
        return $variants;
    }
}