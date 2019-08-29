<?php

namespace App\Command\Admin\Blog\Post\Photo;

use App\Repository\Blog\PostRepository;

class CommandHandler
{
    private $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke(Command $command)
    {
        $this->posts->removePhoto($command->post);
    }
}