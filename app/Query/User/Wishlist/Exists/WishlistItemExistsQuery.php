<?php

namespace App\Query\User\Wishlist\Exists;

use App\Entity\User\User;

class WishlistItemExistsQuery
{
    public $userId;
    public $productId;

    public function __construct(User $user, int $productId)
    {
        $this->userId = $user->id;
        $this->productId = $productId;
    }
}