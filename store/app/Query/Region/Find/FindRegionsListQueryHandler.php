<?php

namespace App\Query\Region\Find;

use App\ReadRepository\RegionReadRepository;

class FindRegionsListQueryHandler
{
    private $regions;

    public function __construct(RegionReadRepository $regions)
    {
        $this->regions = $regions;
    }

    public function __invoke(FindRegionsListQuery $query)
    {
        $regions = $this->regions->findAll();
        return $regions;
    }
}