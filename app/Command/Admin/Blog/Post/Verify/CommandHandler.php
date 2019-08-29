<?php

namespace App\Command\Admin\Blog\Post\Verify;

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
        $this->posts->verify($command->post);
    }
}