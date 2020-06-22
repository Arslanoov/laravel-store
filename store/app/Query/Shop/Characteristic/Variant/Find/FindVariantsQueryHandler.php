<?php

namespace App\Query\Shop\Characteristic\Variant\Find;

use App\ReadRepository\Shop\Characteristic\VariantReadRepository;

class FindVariantsQueryHandler
{
    private $variants;

    public function __construct(VariantReadRepository $variants)
    {
        $this->variants = $variants;
    }

    public function __invoke(FindVariantsQuery $query)
    {
        $variants = $this->variants->findByCharacteristicId($query->characteristicId);
        return $variants;
    }
}