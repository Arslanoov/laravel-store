<?php

namespace App\ReadRepository\Shop;

use App\Entity\Shop\Brand;

class BrandReadRepository
{
    public function findAll()
    {
        $brands = Brand::orderByDesc('id');
        return $brands;
    }
}