<?php

namespace App\UseCases\Cabinet;

use App\Entity\User\User;
use App\Entity\User\WishlistItem;
use App\UseCases\Service;
use App\Command\Cabinet\Wishlist\Create\Command as CreateWishlistItemCommand;
use App\Command\Cabinet\Wishlist\Remove\Command as RemoveWishlistItemCommand;
use App\Query\User\Wishlist\Find\FindWishlistItemsByUserQuery;

class WishlistService extends Service
{
    public function create(User $user, int $productId)
    {
        $this->commandBus->handle(new CreateWishlistItemCommand($user, $productId));
    }

    public function remove(WishlistItem $item)
    {
        $this->commandBus->handle(new RemoveWishlistItemCommand($item));
    }

    public function getAllWishlistItems(User $user)
    {
        $items = $this->queryBus->query(new FindWishlistItemsByUserQuery($user));
        return $items;
    }
}