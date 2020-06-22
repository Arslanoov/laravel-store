<?php

namespace App\UseCases\Admin\Region;

use App\Entity\Region;
use App\UseCases\Service;
use App\Query\Region\Find\FindRegionsListQuery;
use App\Query\Region\Find\FindRegionsQuery;
use App\Http\Requests\Admin\Region\CreateRequest;
use App\Http\Requests\Admin\Region\UpdateRequest;
use App\Command\Admin\Region\Create\Command as RegionCreateCommand;
use App\Command\Admin\Region\Update\Command as RegionUpdateCommand;
use App\Command\Admin\Region\Remove\Command as RegionRemoveCommand;

class RegionManageService extends Service
{
    public function create(CreateRequest $request): void
    {
        $this->commandBus->handle(new RegionCreateCommand($request));
    }

    public function update(UpdateRequest $request, Region $region): void
    {
        $this->commandBus->handle(new RegionUpdateCommand($request, $region));
    }

    public function remove(Region $region): void
    {
        $this->commandBus->handle(new RegionRemoveCommand($region));
    }

    public function getRegions()
    {
        $regions = $this->queryBus->query(new FindRegionsQuery());
        return $regions;
    }

    public function getRegionsList()
    {
        $regions = $this->queryBus->query(new FindRegionsListQuery());
        return $regions;
    }
}