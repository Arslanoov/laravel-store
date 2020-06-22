<?php

namespace App\Query\Shop\Cart\Find;

class FindCartItemByUserAndProductQuery
{
    public $userId;
    public $productId;

    public function __construct(int $userId, int $productId)
    {
        $this->userId = $userId;
        $this->productId = $productId;
    }
}