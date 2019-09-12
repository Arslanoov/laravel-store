<?php

namespace App\Query\Blog\Category\Find;

class FindCategoryBySlugQuery
{
    public $slug;

    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }
}