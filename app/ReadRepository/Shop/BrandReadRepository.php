<?php

namespace App\ReadRepository\Shop;

use App\Entity\Shop\Brand;

class BrandReadRepository
{
    public function findAll()
    {
        $brands = Brand::orderByDesc('id')->get();
        return $brands;
    }

    public function findAllPaginate()
    {
        $brandsList = Brand::orderByDesc('id');
        return $brandsList;
    }
}