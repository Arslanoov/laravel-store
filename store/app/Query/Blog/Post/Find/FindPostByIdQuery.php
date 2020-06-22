<?php

namespace App\Query\Blog\Post\Find;

class FindPostByIdQuery
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}