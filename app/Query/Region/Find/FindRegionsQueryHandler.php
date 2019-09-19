<?php

namespace App\Query\Region\Find;

use App\ReadRepository\RegionReadRepository;

class FindRegionsQueryHandler
{
    private $regions;

    public function __construct(RegionReadRepository $regions)
    {
        $this->regions = $regions;
    }

    public function __invoke(FindRegionsQuery $query)
    {
        $regions = $this->regions->findAllPaginate();
        return $regions;
    }
}