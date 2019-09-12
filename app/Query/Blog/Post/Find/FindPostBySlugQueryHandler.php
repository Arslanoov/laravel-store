<?php

namespace App\Query\Blog\Post\Find;

use App\ReadRepository\Blog\PostReadRepository;

class FindPostBySlugQueryHandler
{
    private $posts;

    public function __construct(PostReadRepository $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke(FindPostBySlugQuery $query)
    {
        $post = $this->posts->findByIdAndSlug($query->id, $query->slug);
        return $post;
    }
}