<?php

namespace App\Query\Region\Find;

class FindRegionByIdQuery
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}