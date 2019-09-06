<?php

namespace App\Command\Admin\Shop\Product\Product\Unavailable;

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
        $this->products->makeUnavailable($command->product);
    }
}