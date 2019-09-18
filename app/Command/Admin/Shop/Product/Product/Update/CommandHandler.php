<?php

namespace App\Command\Admin\Shop\Product\Product\Update;

use App\Repository\Shop\Product\ProductRepository;

class CommandHandler
{
    private $products;

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    public function __invoke(Command $command)
    {
        $this->products->update(
            $command->product, $command->categoryId,
            $command->title, $command->slug,
            $command->price, $command->content,
            $command->weight
        );
    }
}