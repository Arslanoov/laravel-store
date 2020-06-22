<?php

namespace App\Query\Shop\Review\Find;

use App\ReadRepository\Shop\ReviewReadRepository;

class FindReviewsQueryHandler
{
    private $reviews;

    public function __construct(ReviewReadRepository $reviews)
    {
        $this->reviews = $reviews;
    }

    public function __invoke(FindReviewsQuery $query)
    {
        $reviews = $this->reviews->findAll();
        return $reviews;
    }
}