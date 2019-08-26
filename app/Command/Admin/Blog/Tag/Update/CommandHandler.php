<?php

namespace App\Command\Admin\Blog\Tag\Update;

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
        $this->tags->update(
            $command->tag,
            $command->name,
            $command->slug
        );
    }
}