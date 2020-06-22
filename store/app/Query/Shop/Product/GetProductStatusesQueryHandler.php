<?php

namespace App\Query\Shop\Product;

use App\Entity\Shop\Product\Product;

class GetProductStatusesQueryHandler
{
    public function __invoke()
    {
        $statusesList = Product::statusesList();
        return $statusesList;
    }
}