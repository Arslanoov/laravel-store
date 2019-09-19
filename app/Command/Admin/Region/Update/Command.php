<?php

namespace App\Command\Admin\Region\Update;

use App\Entity\Region;
use App\Http\Requests\Admin\Region\UpdateRequest;

class Command
{
    public $parentId;
    public $name;

    public $region;

    public function __construct(UpdateRequest $request, Region $region)
    {
        $this->parentId = $request->parent;
        $this->name = $request->name;
        $this->region = $region;
    }
}