<?php

namespace App\Query\Shop\Order\Find;

class FindByIdQuery
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}