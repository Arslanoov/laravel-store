<?php

namespace App\Command\Shop\Review\Create;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Shop\Review\CreateRequest;

class Command
{
    public $rating;
    public $text;
    public $product;
    public $userId;

    public function __construct(CreateRequest $request, Product $product, int $userId)
    {
        $this->rating = $request->rating;
        $this->text = $request->text;
        $this->product = $product;
        $this->userId = $userId;
    }
}