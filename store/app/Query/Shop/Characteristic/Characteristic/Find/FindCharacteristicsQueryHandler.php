<?php

namespace App\Query\Shop\Characteristic\Characteristic\Find;

use App\ReadRepository\Shop\Characteristic\CharacteristicReadRepository;

class FindCharacteristicsQueryHandler
{
    private $characteristics;

    public function __construct(CharacteristicReadRepository $characteristics)
    {
        $this->characteristics = $characteristics;
    }

    public function __invoke(FindCharacteristicsQuery $query)
    {
        $characteristics = $this->characteristics->findAll();
        return $characteristics;
    }
}