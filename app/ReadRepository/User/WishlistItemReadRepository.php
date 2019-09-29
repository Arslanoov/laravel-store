<?php

namespace App\ReadRepository\User;

use App\Entity\User\WishlistItem;

class WishlistItemReadRepository
{
    public function findByUserId(int $userId)
    {
        $item = WishlistItem::orderByDesc('id')->where('user_id', $userId);
        return $item;
    }

    public function existsByUserIdAndProductId(int $userId, int $productId): bool
    {
        $exists = WishlistItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        return $exists;
    }
}