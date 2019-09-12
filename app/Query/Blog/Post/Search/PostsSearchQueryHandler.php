<?php

namespace App\Query\Blog\Post\Search;

use App\ReadRepository\Blog\PostReadRepository;

class PostsSearchQueryHandler
{
    private $posts;

    public function __construct(PostReadRepository $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke(PostsSearchQuery $query)
    {
        $posts = $this->posts->search($query->query);
        return $posts;
    }
}