<?php

namespace App\Repository\User;

use App\Entity\User\ComparisonItem;

class ComparisonRepository
{
    public function create(int $userId, int $productId): ComparisonItem
    {
        $comparisonItem = ComparisonItem::new($userId, $productId);
        return $comparisonItem;
    }

    public function remove(ComparisonItem $comparisonItem): void
    {
        $comparisonItem->delete();
    }
}