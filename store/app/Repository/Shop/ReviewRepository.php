<?php

namespace App\Repository\Shop;

use App\Entity\Shop\Review;

class ReviewRepository
{
    public function create(
        int $authorId, int $productId,
        int $rating, string $text
    ): Review
    {
        $review = Review::new(
            $authorId, $productId,
            $rating, $text
        );

        return $review;
    }

    public function edit(
        Review $review,
        int $rating,
        string $text
    ): void
    {
        $review->update([
            'rating' => $rating,
            'text' => $text
        ]);
    }

    public function remove(Review $review): void
    {
        $review->delete();
    }
}