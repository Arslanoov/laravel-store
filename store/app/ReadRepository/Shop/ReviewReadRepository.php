<?php

namespace App\ReadRepository\Shop;

use App\Entity\Shop\Review;

class ReviewReadRepository
{
    public function findAll()
    {
        $reviews = Review::orderByDesc('id');
        return $reviews;
    }
}