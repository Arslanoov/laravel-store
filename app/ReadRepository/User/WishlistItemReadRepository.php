<?php

namespace App\ReadRepository\User;

use App\Entity\User\WishlistItem;

class WishlistItemReadRepository
{
    public function findByUserId(int $userId): ?WishlistItem
    {
        $item = WishlistItem::orderByDesc('id')->where('user_id', $userId);
        return $item;
    }
}