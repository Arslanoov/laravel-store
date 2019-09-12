<?php

namespace App\Command\Blog\Comment\Create;

use App\Entity\Blog\Post\Post;
use App\Http\Requests\Blog\Comment\CreateRequest;

class Command
{
    public $parent;
    public $text;
    public $post;
    public $userId;

    public function __construct(
        CreateRequest $request,
        Post $post, $userId
    )
    {
        $this->parent = $request->parent;
        $this->text = $request->text;
        $this->post = $post;
        $this->userId = $userId;
    }
}