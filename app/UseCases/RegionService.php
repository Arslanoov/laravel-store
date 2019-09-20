<?php

namespace App\UseCases;

use App\Query\Region\Find\FindByParentIdQuery;
use App\Query\Region\Find\FindRegionByIdQuery;
use App\Query\Region\Find\FindRootRegionsQuery;

class RegionService extends Service
{
    public function getRootRegions()
    {
        $regions = $this->queryBus->query(new FindRootRegionsQuery());
        return $regions;
    }

    public function findById(int $id)
    {
        $region = $this->queryBus->query(new FindRegionByIdQuery($id));
        return $region;
    }

    public function findByParentId(int $parentId)
    {
        $regions = $this->queryBus->query(new FindByParentIdQuery($parentId));
        return $regions;
    }
}