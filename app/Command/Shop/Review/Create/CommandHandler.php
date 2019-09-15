<?php

namespace App\Command\Shop\Review\Create;

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
        $product = $command->product;

        $this->reviews->create(
            $command->userId, $product->id,
            $command->rating, $command->text
        );

        $this->products->review($product);

        $this->products->recountRating($product);
    }
}