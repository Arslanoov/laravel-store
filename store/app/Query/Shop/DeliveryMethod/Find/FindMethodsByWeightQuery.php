<?php

namespace App\Query\Shop\DeliveryMethod\Find;

class FindMethodsByWeightQuery
{
    public $weight;

    public function __construct(int $weight)
    {
        $this->weight = $weight;
    }
}