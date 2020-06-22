<?php

namespace App\Query\Shop\Cart\Find;

use App\ReadRepository\Shop\Cart\CartItemReadRepository;

class FindCartItemByUserAndProductQueryHandler
{
    private $carts;

    public function __construct(CartItemReadRepository $carts)
    {
        $this->carts = $carts;
    }

    public function __invoke(FindCartItemByUserAndProductQuery $query)
    {
        $cartItem = $this->carts->findByUserAndProduct($query->userId, $query->productId);
        return $cartItem;
    }
}