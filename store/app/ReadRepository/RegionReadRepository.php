<?php

namespace App\ReadRepository;

use App\Entity\Region;

class RegionReadRepository
{
    public function find(int $id): ?Region
    {
        $region = Region::where('id', $id)->first();
        return $region;
    }

    public function findByParentId(int $id)
    {
        $region = Region::where('parent_id', $id)->first();
        return $region;
    }

    public function findAll()
    {
        $regions = Region::orderByDesc('id')->get();
        return $regions;
    }

    public function findAllPaginate()
    {
        $regions = Region::orderByDesc('id');
        return $regions;
    }

    public function findRoot()
    {
        $regions = Region::roots()->get();
        return $regions;
    }
}