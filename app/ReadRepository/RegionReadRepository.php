<?php

namespace App\ReadRepository;

use App\Entity\Region;

class RegionReadRepository
{
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
}