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

    public function findLatest()
    {
        $products = Product::orderByDesc('id')->active();
        return $products;
    }

    public function findById(int $id)
    {
        $product = Product::where('id', $id)->active()->first();
        return $product;
    }

    public function findByIdAndSlug(int $id, string $slug)
    {
        $product = Product::where('id', $id)->where('slug', $slug)->active()->first();
        return $product;
    }

    public function checkIsAvailable(Product $product): bool
    {
        return $product->canBeOrdered();
    }
}