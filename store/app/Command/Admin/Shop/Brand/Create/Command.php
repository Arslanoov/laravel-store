<?php

namespace App\Command\Admin\Shop\Brand\Create;

use App\Http\Requests\Admin\Shop\Brand\CreateRequest;

class Command
{
    public $name;
    public $slug;
    public $description;

    public function __construct(CreateRequest $request)
    {
        $this->name = $request->name;
        $this->slug = $request->slug;
        $this->description = $request->description;
    }
}