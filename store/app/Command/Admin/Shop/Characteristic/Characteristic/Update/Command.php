<?php

namespace App\Command\Admin\Shop\Characteristic\Characteristic\Update;

use App\Entity\Shop\Characteristic\Characteristic;
use App\Http\Requests\Admin\Shop\Characteristic\Characteristic\UpdateRequest;

class Command
{
    public $characteristic;
    public $name;
    public $type;
    public $required;
    public $default;
    public $sort;

    public function __construct(UpdateRequest $request, Characteristic $characteristic)
    {
        $this->name = $request->name;
        $this->type = $request->type;
        $this->required = $request->required;
        $this->default = $request->default;
        $this->sort = $request->sort;
        $this->characteristic = $characteristic;
    }
}