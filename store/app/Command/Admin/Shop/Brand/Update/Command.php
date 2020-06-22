<?php

namespace App\Command\Admin\Shop\Brand\Update;

use App\Entity\Shop\Brand;
use App\Http\Requests\Admin\Shop\Brand\UpdateRequest;

class Command
{
    public $name;
    public $slug;
    public $description;

    public $brand;

    public function __construct(Brand $brand, UpdateRequest $request)
    {
        $this->name = $request->name;
        $this->slug = $request->slug;
        $this->description = $request->description;
        $this->brand = $brand;
    }
}