<?php

namespace App\Query\Region\Find;

use App\ReadRepository\RegionReadRepository;

class FindRootRegionsQueryHandler
{
    private $regions;

    public function __construct(RegionReadRepository $regions)
    {
        $this->regions = $regions;
    }

    public function __invoke(FindRootRegionsQuery $query)
    {
        $regions = $this->regions->findRoot();
        return $regions;
    }
}