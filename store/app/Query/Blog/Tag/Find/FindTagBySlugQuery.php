<?php

namespace App\Query\Blog\Tag\Find;

class FindTagBySlugQuery
{
    public $slug;

    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }
}