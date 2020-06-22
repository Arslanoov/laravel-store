<?php

namespace App\Query\Blog\Post\Search;

class PostsSearchQuery
{
    public $query;

    public function __construct($query)
    {
        $this->query = $query;
    }
}
