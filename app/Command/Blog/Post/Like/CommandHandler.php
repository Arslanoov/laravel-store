<?php

namespace App\Command\Blog\Post\Like;

use App\Repository\Blog\Post\LikeRepository;
use App\Repository\Blog\PostRepository;

class CommandHandler
{
    private $posts;
    private $likes;

    public function __construct(PostRepository $posts, LikeRepository $likes)
    {
        $this->posts = $posts;
        $this->likes = $likes;
    }

    public function __invoke(Command $command)
    {
        $this->likes->create($command->userId, $command->post->id);
        $this->posts->like($command->post);
    }
}