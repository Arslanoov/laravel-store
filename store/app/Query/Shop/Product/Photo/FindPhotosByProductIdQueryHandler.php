<?php

namespace App\Query\Shop\Product\Photo;

use App\ReadRepository\Shop\Product\PhotoReadRepository;

class FindPhotosByProductIdQueryHandler
{
    private $photos;

    public function __construct(PhotoReadRepository $photos)
    {
        $this->photos = $photos;
    }

    public function __invoke(FindPhotosByProductIdQuery $query)
    {
        $photos = $this->photos->findByProductId($query->productId);
        return $photos;
    }
}