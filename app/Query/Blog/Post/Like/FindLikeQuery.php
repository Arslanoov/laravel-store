<?php

namespace App\Query\Blog\Post\Like;

class FindLikeQuery
{
    public $postId;
    public $userId;

    public function __construct(int $postId, int $userId)
    {
        $this->postId = $postId;
        $this->userId = $userId;
    }
}