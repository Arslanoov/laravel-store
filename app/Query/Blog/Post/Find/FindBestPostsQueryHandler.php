<?php

namespace App\Query\Blog\Post\Find;

use App\ReadRepository\Blog\PostReadRepository;

class FindBestPostsQueryHandler
{
    private $posts;

    public function __construct(PostReadRepository $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke()
    {
        $posts = $this->posts->findBest();
        return $posts;
    }
}