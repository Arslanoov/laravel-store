<?php

namespace App\Query\Shop\DeliveryMethod\Find;

use App\ReadRepository\Shop\DeliveryMethodReadRepository;

class FindByIdQueryHandler
{
    private $methods;

    public function __construct(DeliveryMethodReadRepository $deliveryMethods)
    {
        $this->methods = $deliveryMethods;
    }

    public function __invoke(FindByIdQuery $query)
    {
        $deliveryMethod = $this->methods->findById($query->id);
        return $deliveryMethod;
    }
}