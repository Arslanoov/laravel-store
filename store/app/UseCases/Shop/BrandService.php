<?php

namespace App\UseCases\Shop;

use App\Query\Shop\Brand\Find\FindBrandBySlugQuery;
use App\Query\Shop\Brand\Find\FindBrandsListQuery;
use App\UseCases\Service;

class BrandService extends Service
{
    public function getAllBrands()
    {
        $brands = $this->queryBus->query(new FindBrandsListQuery());
        return $brands;
    }

    public function findBrandBySlug(string $slug)
    {
        $brand = $this->commandBus->handle(new FindBrandBySlugQuery($slug));
        return $brand;
    }
}