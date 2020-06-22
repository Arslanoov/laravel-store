<?php

namespace App\UseCases\Shop;

use App\Query\Shop\Product\Find\FindProductByIdAndSlugQuery;
use App\Query\Shop\Product\Find\FindProductByIdQuery;
use App\Query\Shop\Product\Find\FindProductsListQuery;
use App\UseCases\Service;

class ProductService extends Service
{
    public function getAllProducts()
    {
        $products = $this->queryBus->query(new FindProductsListQuery());
        return $products;
    }

    public function findProductById(int $id)
    {
        $product = $this->queryBus->query(new FindProductByIdQuery($id));
        return $product;
    }

    public function findProductBySlug(int $id, string $slug)
    {
        $product = $this->queryBus->query(new FindProductByIdAndSlugQuery($id, $slug));
        return $product;
    }
}