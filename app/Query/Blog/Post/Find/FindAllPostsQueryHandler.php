<?php

namespace App\Query\Blog\Post\Find;

use App\ReadRepository\Blog\PostReadRepository;

class FindAllPostsQueryHandler
{
    private $posts;

    public function __construct(PostReadRepository $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke(FindAllPostsQuery $query)
    {
        $posts = $this->posts->findLatest();
        return $posts;
    }
}