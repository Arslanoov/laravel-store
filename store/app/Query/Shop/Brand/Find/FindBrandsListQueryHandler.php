<?php

namespace App\Query\Shop\Brand\Find;

use App\ReadRepository\Shop\BrandReadRepository;

class FindBrandsListQueryHandler
{
    private $brands;

    public function __construct(BrandReadRepository $brands)
    {
        $this->brands = $brands;
    }

    public function __invoke(FindBrandsListQuery $query)
    {
        $brands = $this->brands->findAll();
        return $brands;
    }
}