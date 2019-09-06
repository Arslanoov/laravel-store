<?php

namespace App\ReadRepository\Shop\Product;

use App\Entity\Shop\Product\Product;

class ProductReadRepository
{
    public function findAll()
    {
        $products = Product::orderByDesc('id');
        return $products;
    }
}