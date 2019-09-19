<?php

namespace App\Query\Shop\DeliveryMethod\Find;

use App\ReadRepository\Shop\DeliveryMethodReadRepository;

class FindMethodsByWeightQueryHandler
{
    private $methods;

    public function __construct(DeliveryMethodReadRepository $methods)
    {
        $this->methods = $methods;
    }

    public function __invoke(FindMethodsByWeightQuery $query)
    {
        $methods = $this->methods->findByWeight($query->weight);
        return $methods;
    }
}