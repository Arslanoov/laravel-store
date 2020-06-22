<?php

namespace App\Query\Shop\DeliveryMethod\Find;

use App\ReadRepository\Shop\DeliveryMethodReadRepository;

class FindMethodsQueryHandler
{
    private $methods;

    public function __construct(DeliveryMethodReadRepository $methods)
    {
        $this->methods = $methods;
    }

    public function __invoke()
    {
        $methods = $this->methods->findAll();
        return $methods;
    }
}