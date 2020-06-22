<?php

namespace App\Command\Admin\Shop\Review\Update;

use App\Repository\Shop\ReviewRepository;

class CommandHandler
{
    private $reviews;

    public function __construct(ReviewRepository $reviews)
    {
        $this->reviews = $reviews;
    }

    public function __invoke(Command $command)
    {
        $this->reviews->edit(
            $command->review,
            $command->rating,
            $command->text
        );
    }
}