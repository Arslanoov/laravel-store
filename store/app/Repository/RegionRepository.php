<?php

namespace App\Repository;

use App\Entity\Region;

class RegionRepository
{
    public function create($parentId, $name): Region
    {
        $region = Region::new(
            $parentId, $name
        );

        return $region;
    }

    public function update(
        Region $region,
        $parentId, $name
    ): void
    {
        $region->update([
            'parent_id' => $parentId,
            'name' => $name
        ]);
    }

    public function remove(Region $region): void
    {
        $region->delete();
    }
}