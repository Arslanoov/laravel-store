<?php

namespace App\UseCases\Admin\Shop;

use App\Entity\Shop\Brand;
use App\Http\Requests\Admin\Shop\Brand\CreateRequest;
use App\Http\Requests\Admin\Shop\Brand\UpdateRequest;
use App\Command\Admin\Shop\Brand\Create\Command as BrandCreateCommand;
use App\Command\Admin\Shop\Brand\Update\Command as BrandUpdateCommand;
use App\Command\Admin\Shop\Brand\Remove\Command as BrandRemoveCommand;
use App\Query\Shop\Brand\Find\FindBrandsQuery;
use App\UseCases\Service;

class BrandManageService extends Service
{
    public function create(CreateRequest $request): void
    {
        $this->commandBus->handle(new BrandCreateCommand($request));
    }

    public function update(UpdateRequest $request, Brand $brand): void
    {
        $this->commandBus->handle(new BrandUpdateCommand($brand, $request));
    }

    public function remove(Brand $brand): void
    {
        $this->commandBus->handle(new BrandRemoveCommand($brand));
    }

    public function getBrands()
    {
        $brands = $this->queryBus->query(new FindBrandsQuery());
        return $brands;
    }
}