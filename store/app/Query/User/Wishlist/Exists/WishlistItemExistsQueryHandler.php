<?php

namespace App\Query\User\Wishlist\Exists;

use App\ReadRepository\User\WishlistItemReadRepository;

class WishlistItemExistsQueryHandler
{
    private $items;

    public function __construct(WishlistItemReadRepository $items)
    {
        $this->items = $items;
    }

    public function __invoke(WishlistItemExistsQuery $query)
    {
        $exists = $this->items->existsByUserIdAndProductId(
            $query->userId,
            $query->productId
        );

        return $exists;
    }
}