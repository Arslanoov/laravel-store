<?php

namespace App\Query\Shop\Characteristic\Variant\Find;

use App\ReadRepository\Shop\Characteristic\VariantReadRepository;

class FindVariantsByCharacteristicIdQueryHandler
{
    private $variants;

    public function __construct(VariantReadRepository $variants)
    {
        $this->variants = $variants;
    }

    public function __invoke(FindVariantsByCharacteristicIdQuery $query)
    {
        $variants = $this->variants->findByCharacteristicId($query->id);
        return $variants;
    }
}