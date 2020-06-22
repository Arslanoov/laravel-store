<?php

namespace App\Command\Admin\Blog\TagAssignment\Existing;

use App\ReadRepository\Blog\Post\TagAssignmentReadRepository;
use App\ReadRepository\Blog\TagReadRepository;
use App\Repository\Blog\Post\TagAssignmentRepository;

class CommandHandler
{
    private $tagAssignments;
    private $tagAssignmentsRead;

    public function __construct(
        TagAssignmentReadRepository $tagAssignmentsRead,
        TagAssignmentRepository $tagAssignments
    )
    {
        $this->tagAssignments = $tagAssignments;
        $this->tagAssignmentsRead = $tagAssignmentsRead;
    }

    public function __invoke(Command $command)
    {
        $postId = $command->postId;
        $assignments = $this->tagAssignmentsRead->findAllByPost($postId);

        foreach ($assignments as $assignment) {
            $this->tagAssignments->remove($assignment);
        }

        $existingTags = $command->tagsExisting;

        if (is_array($existingTags)) {
            foreach ($existingTags as $tagId) {
                $this->tagAssignments->create(
                    $postId, $tagId
                );
            }
        }
    }
}