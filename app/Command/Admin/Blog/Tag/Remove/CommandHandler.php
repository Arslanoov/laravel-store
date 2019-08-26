<?php

namespace App\Command\Admin\Blog\Tag\Remove;

use App\Repository\Blog\TagRepository;

class CommandHandler
{
    private $tags;

    public function __construct(TagRepository $tags)
    {
        $this->tags = $tags;
    }

    public function __invoke(Command $command)
    {
        $this->tags->remove($command->tag);
    }
}