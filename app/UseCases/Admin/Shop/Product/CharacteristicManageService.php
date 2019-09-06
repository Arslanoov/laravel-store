<?php

namespace App\UseCases\Admin\Shop\Product;

use App\Command\CommandBus;
use App\Query\QueryBus;
use App\Entity\Shop\Product\Characteristic;
use App\Entity\Shop\Product\Product;
use App\Http\Requests\Admin\Shop\Product\Characteristic\CreateVariantRequest;
use App\Http\Requests\Admin\Shop\Product\Characteristic\CreateRequest;
use App\Command\Admin\Shop\Product\Characteristic\Create\Command as CharacteristicCreateCommand;
use App\Command\Admin\Shop\Product\Characteristic\AddVariant\Command as CharacteristicAddVariantCommand;
use App\Command\Admin\Shop\Product\Characteristic\Remove\Command as CharacteristicRemoveCommand;
use App\Query\Shop\Characteristic\Variant\Find\FindVariantsQuery;
use App\Query\Shop\Product\Characteristic\Find\FindCharacteristicsQuery;
use App\Entity\Shop\Characteristic\Characteristic as ShopCharacteristic;

class CharacteristicManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(CreateRequest $request, Product $product): void
    {
        $this->commandBus->handle(new CharacteristicCreateCommand($request, $product->id));
    }

    public function addVariant(CreateVariantRequest $request, Characteristic $characteristic): void
    {
        $this->commandBus->handle(new CharacteristicAddVariantCommand($request, $characteristic));
    }

    public function remove(Characteristic $characteristic): void
    {
        $this->commandBus->handle(new CharacteristicRemoveCommand($characteristic));
    }

    public function getCharacteristics()
    {
        $characteristicsAssignments = $this->queryBus->query(new FindCharacteristicsQuery());
        return $characteristicsAssignments;
    }

    public function getVariants(ShopCharacteristic $characteristic)
    {
        $variants = $this->queryBus->query(new FindVariantsQuery($characteristic->id));
        return $variants;
    }
}