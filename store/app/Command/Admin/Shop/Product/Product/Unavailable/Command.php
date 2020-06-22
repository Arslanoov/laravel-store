<?php

namespace App\Command\Admin\Shop\Product\Product\Unavailable;

use App\Entity\Shop\Product\Product;

class Command
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}