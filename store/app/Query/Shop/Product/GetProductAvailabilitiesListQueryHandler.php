<?php

namespace App\Query\Shop\Product;

use App\Entity\Shop\Product\Product;

class GetProductAvailabilitiesListQueryHandler
{
    public function __invoke()
    {
        $availabilitiesList = Product::availabilitiesList();
        return $availabilitiesList;
    }
}