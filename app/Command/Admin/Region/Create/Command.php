<?php

namespace App\Command\Admin\Region\Create;

use App\Http\Requests\Admin\Region\CreateRequest;

class Command
{
    public $parentId;
    public $name;

    public function __construct(CreateRequest $request)
    {
        $this->parentId = $request->parent;
        $this->name = $request->name;
    }
}