<?php

namespace App\Query\Cabinet\Profile\Find;

class FindProfileByUserIdQuery
{
    public $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }
}