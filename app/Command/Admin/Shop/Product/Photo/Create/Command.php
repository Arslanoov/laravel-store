<?php

namespace App\Command\Admin\Shop\Product\Photo\Create;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Admin\Shop\Product\Photo\CreateRequest;

class Command
{
    public $photos;

    public $product;

    public function __construct(CreateRequest $request, Product $product)
    {
        $this->photos = $request->photos;
        $this->product = $product;
    }
}