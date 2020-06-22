<?php

namespace App\Query\Blog\Post;

use App\Entity\Blog\Post\Post;

class GetPostStatusesQueryHandler
{
    public function __invoke(GetPostStatusesQuery $query)
    {
        $statuses = Post::statusesList();
        return $statuses;
    }
}