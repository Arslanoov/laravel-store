<?php

namespace App\Query\Blog\Post\Find;

class FindPostBySlugQuery
{
    public $id;
    public $slug;

    public function __construct(int $id, string $slug)
    {
        $this->id = $id;
        $this->slug = $slug;
    }
}