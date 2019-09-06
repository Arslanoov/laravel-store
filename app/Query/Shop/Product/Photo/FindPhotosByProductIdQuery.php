<?php

namespace App\Query\Shop\Product\Photo;

class FindPhotosByProductIdQuery
{
    public $productId;

    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }
}