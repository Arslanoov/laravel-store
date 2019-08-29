<?php

namespace App\Query\Blog\Post\Comment\Find;

use App\ReadRepository\Blog\Post\CommentReadRepository;

class FindCommentsQueryHandler
{
    private $comments;

    public function __construct(CommentReadRepository $comments)
    {
        $this->comments = $comments;
    }

    public function __invoke()
    {
        $comments = $this->comments->findAll();
        return $comments;
    }
}