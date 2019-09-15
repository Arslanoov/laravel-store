<?php

namespace App\Query\Shop\Product\Find;

class FindProductByIdQuery
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}