<?php

namespace App\Query\Shop\Characteristic\Variant\Find;

class FindVariantsByCharacteristicIdQuery
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}