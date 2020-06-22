<?php

namespace App\Query\Shop\Brand\Find;

class FindBrandBySlugQuery
{
    public $slug;

    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }
}