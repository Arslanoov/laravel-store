<?php

namespace App\Query\Shop\Comment\Find;

use App\ReadRepository\Shop\CommentReadRepository;

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