<?php

namespace App\UseCases\Admin\Shop\Product;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Admin\Shop\Product\Product\CreateRequest;
use App\Http\Requests\Admin\Shop\Product\Product\UpdateRequest;
use App\Command\Admin\Shop\Product\Product\Create\Command as ProductCreateCommand;
use App\Command\Admin\Shop\Product\Product\Update\Command as ProductUpdateCommand;
use App\Command\Admin\Shop\Product\Product\Remove\Command as ProductRemoveCommand;
use App\Command\Admin\Shop\Product\Product\Activate\Command as ProductActivateCommand;
use App\Command\Admin\Shop\Product\Product\Draft\Command as ProductDraftCommand;
use App\Command\Admin\Shop\Product\Product\Available\Command as ProductAvailableCommand;
use App\Command\Admin\Shop\Product\Product\Unavailable\Command as ProductUnavailableCommand;
use App\Query\Shop\Brand\Find\FindBrandsListQuery;
use App\Query\Shop\Category\Find\FindCategoriesTreeQuery;
use App\Query\Shop\Product\Find\FindProductsQuery;
use App\Query\Shop\Product\GetProductAvailabilitiesListQuery;
use App\Query\Shop\Product\GetProductStatusesQuery;
use App\UseCases\Service;

class ProductManageService extends Service
{
    public function create(CreateRequest $request): void
    {
        $this->commandBus->handle(new ProductCreateCommand($request));
    }

    public function update(UpdateRequest $request, Product $product): void
    {
        $this->commandBus->handle(new ProductUpdateCommand($request, $product));
    }

    public function remove(Product $product): void
    {
        $this->commandBus->handle(new ProductRemoveCommand($product));
    }

    public function activate(Product $product): void
    {
        $this->commandBus->handle(new ProductActivateCommand($product));
    }

    public function draft(Product $product): void
    {
        $this->commandBus->handle(new ProductDraftCommand($product));
    }

    public function makeAvailable(Product $product): void
    {
        $this->commandBus->handle(new ProductAvailableCommand($product));
    }

    public function makeUnavailable(Product $product): void
    {
        $this->commandBus->handle(new ProductUnavailableCommand($product));
    }

    public function getProducts()
    {
        $products = $this->queryBus->query(new FindProductsQuery());
        return $products;
    }

    public function getBrands()
    {
        $brands = $this->queryBus->query(new FindBrandsListQuery());
        return $brands;
    }

    public function getCategoryTree()
    {
        $categories = $this->queryBus->query(new FindCategoriesTreeQuery());
        return $categories;
    }

    public function getAvailabilitiesList(): array
    {
        $availabilities = $this->queryBus->query(new GetProductAvailabilitiesListQuery());
        return $availabilities;
    }

    public function getStatusesList(): array
    {
        $statuses = $this->queryBus->query(new GetProductStatusesQuery());
        return $statuses;
    }
}