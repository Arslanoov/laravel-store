<?php

namespace App\Query\Shop\Product\Find;

use App\ReadRepository\Shop\Product\ProductReadRepository;

class FindProductsListQueryHandler
{
    private $products;

    public function __construct(ProductReadRepository $products)
    {
        $this->products = $products;
    }

    public function __invoke(FindProductsListQuery $query)
    {
        $products = $this->products->findLatest();
        return $products;
    }
}