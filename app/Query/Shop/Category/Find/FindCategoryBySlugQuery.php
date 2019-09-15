<?php

namespace App\Query\Shop\Category\Find;

class FindCategoryBySlugQuery
{
    public $slug;

    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }
}