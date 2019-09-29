<?php

namespace App\Query\User\Wishlist\Find;

use App\Entity\User\User;

class FindWishlistItemsByUserQuery
{
    public $userId;

    public function __construct(User $user)
    {
        $this->userId = $user->id;
    }
}