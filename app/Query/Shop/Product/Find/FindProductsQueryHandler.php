<?php

namespace App\Query\Shop\Product\Find;

use App\ReadRepository\Shop\Product\ProductReadRepository;

class FindProductsQueryHandler
{
    private $products;

    public function __construct(ProductReadRepository $products)
    {
        $this->products = $products;
    }

    public function __invoke(FindProductsQuery $query)
    {
        $products = $this->products->findLatest();
        return $products;
    }
}