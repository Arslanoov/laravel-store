<?php

namespace App\Query\Blog\Post\Find;

use App\ReadRepository\Blog\PostReadRepository;

class FindPostByIdQueryHandler
{
    private $posts;

    public function __construct(PostReadRepository $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke(FindPostByIdQuery $query)
    {
        $post = $this->posts->findById($query->id);
        return $post;
    }
}