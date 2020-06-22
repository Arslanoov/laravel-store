<?php

namespace App\Command\Admin\Blog\TagAssignment\Existing;

class Command
{
    public $tagsExisting;
    public $postId;

    public function __construct($request, int $postId)
    {
        $this->tagsExisting = $request->tagsExisting;
        $this->postId = $postId;
    }
}