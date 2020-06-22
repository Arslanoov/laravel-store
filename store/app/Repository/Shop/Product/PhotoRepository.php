<?php

namespace App\Repository\Shop\Product;

use App\Entity\Shop\Product\Photo;
use App\Entity\Shop\Product\Product;

class PhotoRepository
{
    public function remove(Photo $photo): void
    {
        $photo->delete();
    }
}