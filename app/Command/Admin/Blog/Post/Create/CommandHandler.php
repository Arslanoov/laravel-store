<?php

namespace App\Command\Admin\Blog\Post\Create;

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
        $post = $this->posts->create(
            $command->authorId, $command->categoryId,
            $command->title,
            $command->slug, $command->description,
            $command->content
        );

        if ($command->photo) {
            $this->posts->addPhoto($post, $command->photo);
        }

        return $post->id;
    }
}