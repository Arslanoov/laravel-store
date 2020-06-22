<?php

namespace App\Command\Admin\Shop\Comment\Update;

use App\Entity\Shop\Comment;
use App\Http\Requests\Admin\Shop\Comment\UpdateRequest;

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