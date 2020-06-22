<?php

namespace App\Query\Shop\Product\Find;

class FindProductByIdAndSlugQuery
{
    public $id;
    public $slug;

    public function __construct(int $id, string $slug)
    {
        $this->id = $id;
        $this->slug = $slug;
    }
}