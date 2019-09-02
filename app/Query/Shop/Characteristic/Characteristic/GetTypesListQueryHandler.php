<?php

namespace App\Query\Shop\Characteristic\Characteristic;

use App\Entity\Shop\Characteristic\Characteristic;

class GetTypesListQueryHandler
{
    public function __invoke(GetTypesListQuery $query)
    {
        $types = Characteristic::typesList();
        return $types;
    }
}