<?php

namespace App\Query\Shop\Brand\Find;

use App\ReadRepository\Shop\BrandReadRepository;

class FindBrandBySlugQueryHandler
{
    private $brands;

    public function __construct(BrandReadRepository $brands)
    {
        $this->brands = $brands;
    }

    public function __invoke(FindBrandBySlugQuery $query)
    {
        $brand = $this->brands->findBySlug($query->slug);
        return $brand;
    }
}