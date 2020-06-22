<?php

namespace App\Query\Region\Find;

use App\ReadRepository\RegionReadRepository;

class FindRegionByIdQueryHandler
{
    private $regions;

    public function __construct(RegionReadRepository $regions)
    {
        $this->regions = $regions;
    }

    public function __invoke(FindRegionByIdQuery $query)
    {
        $region = $this->regions->find($query->id);
        return $region;
    }
}