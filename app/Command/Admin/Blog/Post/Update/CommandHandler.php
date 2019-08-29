<?php

namespace App\Command\Admin\Blog\Post\Update;

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
        $this->posts->update(
            $command->post, $command->categoryId,
            $command->title,
            $command->slug, $command->description,
            $command->content
        );

        $this->posts->addPhoto($command->post, $command->photo);
    }
}