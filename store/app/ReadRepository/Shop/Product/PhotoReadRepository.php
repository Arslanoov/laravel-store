<?php

namespace App\ReadRepository\Shop\Product;

use App\Entity\Shop\Product\Photo;

class PhotoReadRepository
{
    public function findByProductId(int $productId)
    {
        $photos = Photo::where('product_id', $productId)->get();
        return $photos;
    }
}