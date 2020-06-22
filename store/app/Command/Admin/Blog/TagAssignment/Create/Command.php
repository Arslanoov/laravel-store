<?php

namespace App\Command\Admin\Blog\TagAssignment\Create;

class Command
{
    public $tagsString;
    public $postId;

    public function __construct($request, int $postId)
    {
        $this->tagsString = $request->tagsNew;
        $this->postId = $postId;
    }
}