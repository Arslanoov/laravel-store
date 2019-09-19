<?php

namespace App\Command\Admin\Shop\Product\Product\Create;

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
        $this->products->create(
            $command->categoryId, $command->brandId,
            $command->title, $command->slug,
            $command->price, $command->text,
            $command->weight, $command->quantity
        );
    }
}