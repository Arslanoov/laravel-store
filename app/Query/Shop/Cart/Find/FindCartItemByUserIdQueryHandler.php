<?php

namespace App\Query\Shop\Cart\Find;

use App\ReadRepository\Shop\Cart\CartItemReadRepository;

class FindCartItemByUserIdQueryHandler
{
    private $carts;

    public function __construct(CartItemReadRepository $carts)
    {
        $this->carts = $carts;
    }

    public function __invoke(FindCartItemByUserIdQuery $query)
    {
        $cartItem = $this->carts->findByUserId($query->userId);
        return $cartItem;
    }
}