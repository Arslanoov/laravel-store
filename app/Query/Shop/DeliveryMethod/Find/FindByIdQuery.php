<?php

namespace App\Query\Shop\DeliveryMethod\Find;

class FindByIdQuery
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}