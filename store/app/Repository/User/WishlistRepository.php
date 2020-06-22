<?php

namespace App\Repository\User;

use App\Entity\User\WishlistItem;

class WishlistRepository
{
    public function create(int $userId, int $productId): WishlistItem
    {
        $item = WishlistItem::new(
            $userId,
            $productId
        );

        return $item;
    }

    public function remove(WishlistItem $item): void
    {
        $item->delete();
    }
}