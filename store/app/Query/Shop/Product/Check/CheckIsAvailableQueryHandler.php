<?php

namespace App\Query\Shop\Product\Check;

use App\ReadRepository\Shop\Product\ProductReadRepository;

class CheckIsAvailableQueryHandler
{
    private $products;

    public function __construct(ProductReadRepository $products)
    {
        $this->products = $products;
    }

    public function __invoke(CheckIsAvailableQuery $query)
    {
        $product = $this->products->findById($query->productId);
        $isAvailable = $this->products->checkIsAvailable($product);
        return $isAvailable;
    }
}