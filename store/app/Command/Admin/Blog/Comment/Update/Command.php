<?php

namespace App\Command\Admin\Blog\Comment\Update;

use App\Entity\Blog\Comment;
use App\Http\Requests\Admin\Blog\Post\Comment\UpdateRequest;

class Command
{
    public $comment;
    public $parentId;
    public $text;

    public function __construct(Comment $comment, UpdateRequest $request)
    {
        $this->comment = $comment;
        $this->parentId = $request->parentId;
        $this->text = $request->text;
    }
}