<?php

namespace App\ReadRepository\User;

use App\Entity\User\ComparisonItem;

class ComparisonReadRepository
{
    public function existsByUserIdAndProductId(int $userId, int $productId): bool
    {
        $exists = ComparisonItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        return $exists;
    }
}