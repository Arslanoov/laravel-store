<?php

namespace App\Command\Admin\Shop\Review\Update;

use App\Entity\Shop\Review;
use App\Http\Requests\Admin\Shop\Review\UpdateRequest;

class Command
{
    public $review;
    public $rating;
    public $text;

    public function __construct(Review $review, UpdateRequest $request)
    {
        $this->review = $review;
        $this->rating = $request->rating;
        $this->text = $request->text;
    }
}