<?php

namespace App\Query\User\Comparison\Exists;

use App\Entity\User\User;

class ComparisonItemExistsQuery
{
    public $userId;
    public $productId;

    public function __construct(User $user, int $productId)
    {
        $this->userId = $user->id;
        $this->productId = $productId;
    }
}