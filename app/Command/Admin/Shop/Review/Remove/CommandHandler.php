<?php

namespace App\Command\Admin\Shop\Review\Remove;

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
        $this->reviews->remove($command->review);
    }
}