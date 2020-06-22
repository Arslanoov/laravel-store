<?php

namespace App\Query\Shop\Product\Find;

use App\ReadRepository\Shop\Product\ProductReadRepository;

class FindProductByIdQueryHandler
{
    private $products;

    public function __construct(ProductReadRepository $products)
    {
        $this->products = $products;
    }

    public function __invoke(FindProductByIdQuery $query)
    {
        $product = $this->products->findById($query->id);
        return $product;
    }
}