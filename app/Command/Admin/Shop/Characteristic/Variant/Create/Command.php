<?php

namespace App\Command\Admin\Shop\Characteristic\Variant\Create;

use App\Entity\Shop\Characteristic\Characteristic;
use App\Http\Requests\Admin\Shop\Characteristic\Variant\CreateRequest;

class Command
{
    public $characteristicId;
    public $name;

    public function __construct(CreateRequest $request, Characteristic $characteristic)
    {
        $this->characteristicId = $characteristic->id;
        $this->name = $request->name;
    }
}