<?php

namespace App\Command\Admin\Blog\TagAssignment\Create;

use App\Repository\Blog\Post\TagAssignmentRepository;
use App\Repository\Blog\TagRepository;
use Illuminate\Support\Str;

class CommandHandler
{
    private $tags;
    private $tagAssignments;

    public function __construct(TagRepository $tags, TagAssignmentRepository $tagAssignments)
    {
        $this->tagAssignments = $tagAssignments;
        $this->tags = $tags;
    }

    public function __invoke(Command $command)
    {
        $postId = $command->postId;
        $tags = explode(', ', $command->tagsString);

        foreach ($tags as $tagName) {
            if ($tagName !== '') {
                $tag = $this->tags->create(
                    $tagName,
                    Str::slug($tagName, "-")
                );

                $this->tagAssignments->create(
                    $postId,
                    $tag->id
                );
            }
        }
    }
}