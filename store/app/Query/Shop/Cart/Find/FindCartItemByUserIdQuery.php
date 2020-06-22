<?php

namespace App\Query\Shop\Cart\Find;

class FindCartItemByUserIdQuery
{
    public $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }
}