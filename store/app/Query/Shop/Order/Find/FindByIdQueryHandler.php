<?php

namespace App\Query\Shop\Order\Find;

use App\ReadRepository\Shop\Order\OrderReadRepository;

class FindByIdQueryHandler
{
    private $orders;

    public function __construct(OrderReadRepository $orders)
    {
        $this->orders = $orders;
    }

    public function __invoke(FindByIdQuery $query)
    {
        $order = $this->orders->findById($query->id);
        return $order;
    }
}