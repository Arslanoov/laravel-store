<?php

namespace App\Command\Shop\Comment\Create;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Shop\Comment\CreateRequest;

class Command
{
    public $parent;
    public $text;
    public $product;
    public $userId;

    public function __construct(CreateRequest $request, Product $product, int $userId)
    {
        $this->parent = $request->parent;
        $this->text = $request->text;
        $this->product = $product;
        $this->userId = $userId;
    }
}