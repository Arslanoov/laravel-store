<?php

namespace App\Query\Shop\Characteristic\Variant\Find;

class FindVariantsQuery
{
    public $characteristicId;

    public function __construct(int $characteristicId)
    {
        $this->characteristicId = $characteristicId;
    }
}