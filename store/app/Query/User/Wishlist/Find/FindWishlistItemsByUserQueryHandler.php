<?php

namespace App\Query\User\Wishlist\Find;

use App\ReadRepository\User\WishlistItemReadRepository;

class FindWishlistItemsByUserQueryHandler
{
    private $items;

    public function __construct(WishlistItemReadRepository $items)
    {
        $this->items = $items;
    }

    public function __invoke(FindWishlistItemsByUserQuery $query)
    {
        $items = $this->items->findByUserId($query->userId);
        return $items;
    }
}