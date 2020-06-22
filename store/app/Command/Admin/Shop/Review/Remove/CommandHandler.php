<?php

namespace App\Command\Admin\Shop\Review\Remove;

use App\Repository\Shop\Product\ProductRepository;
use App\Repository\Shop\ReviewRepository;

class CommandHandler
{
    private $products;
    private $reviews;

    public function __construct(ProductRepository $products, ReviewRepository $reviews)
    {
        $this->products = $products;
        $this->reviews = $reviews;
    }

    public function __invoke(Command $command)
    {
        $this->reviews->remove($command->review);

        $this->products->removeReview($command->product);
    }
}