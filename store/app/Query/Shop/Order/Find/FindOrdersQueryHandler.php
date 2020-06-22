<?php

namespace App\Query\Shop\Order\Find;

use App\ReadRepository\Shop\Order\OrderReadRepository;

class FindOrdersQueryHandler
{
    private $orders;

    public function __construct(OrderReadRepository $orders)
    {
        $this->orders = $orders;
    }

    public function __invoke(FindOrdersQuery $query)
    {
        $orders = $this->orders->findAll();
        return $orders;
    }
}