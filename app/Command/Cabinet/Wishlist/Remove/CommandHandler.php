<?php

namespace App\Command\Cabinet\Wishlist\Remove;

use App\Repository\User\WishlistRepository;

class CommandHandler
{
    private $items;

    public function __construct(WishlistRepository $items)
    {
        $this->items = $items;
    }

    public function __invoke(Command $command)
    {
        $this->items->remove($command->item);
    }
}