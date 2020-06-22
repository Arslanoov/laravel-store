<?php

namespace App\Command\Admin\Shop\Review\Remove;

use App\Entity\Shop\Product\Product;
use App\Entity\Shop\Review;

class Command
{
    public $product;
    public $review;

    public function __construct(Product $product, Review $review)
    {
        $this->product = $product;
        $this->review = $review;
    }
}