<?php

namespace App\Query\Cabinet\Order\Find;

class FindByUserIdAndIdQuery
{
    public $id;
    public $userId;

    public function __construct(int $id, int $userId)
    {
        $this->id = $id;
        $this->userId = $userId;
    }
}