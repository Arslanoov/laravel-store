<?php

namespace App\Query\Cabinet\Order\Find;

use App\ReadRepository\Shop\Order\OrderReadRepository;

class FindByUserIdAndIdQueryHandler
{
    private $orders;

    public function __construct(OrderReadRepository $orders)
    {
        $this->orders = $orders;
    }

    public function __invoke(FindByUserIdAndIdQuery $query)
    {
        $order = $this->orders->findByUserIdAndId(
            $query->userId,
            $query->id
        );
        return $order;
    }
}