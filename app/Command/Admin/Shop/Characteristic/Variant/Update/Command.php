<?php

namespace App\Command\Admin\Shop\Characteristic\Variant\Update;

use App\Entity\Shop\Characteristic\Variant;
use App\Http\Requests\Admin\Shop\Characteristic\Variant\UpdateRequest;

class Command
{
    public $name;
    public $variant;

    public function __construct(UpdateRequest $request, Variant$variant)
    {
        $this->name = $request->name;
        $this->variant = $variant;
    }
}