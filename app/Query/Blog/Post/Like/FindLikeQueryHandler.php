<?php

namespace App\Query\Blog\Post\Like;

use App\ReadRepository\Blog\Post\LikeReadRepository;

class FindLikeQueryHandler
{
    private $likes;

    public function __construct(LikeReadRepository $likes)
    {
        $this->likes = $likes;
    }

    public function __invoke(FindLikeQuery $query)
    {
        $like = $this->likes->find($query->postId, $query->userId);
        return $like;
    }
}