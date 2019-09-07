<?php

namespace App\Command\Admin\Shop\Review\Remove;

use App\Entity\Shop\Review;

class Command
{
    public $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }
}