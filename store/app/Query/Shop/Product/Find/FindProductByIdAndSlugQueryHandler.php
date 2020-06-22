<?php

namespace App\Query\Shop\Product\Find;

use App\ReadRepository\Shop\Product\ProductReadRepository;

class FindProductByIdAndSlugQueryHandler
{
    private $products;

    public function __construct(ProductReadRepository $products)
    {
        $this->products = $products;
    }

    public function __invoke(FindProductByIdAndSlugQuery $query)
    {
        $product = $this->products->findByIdAndSlug($query->id, $query->slug);
        return $product;
    }
}