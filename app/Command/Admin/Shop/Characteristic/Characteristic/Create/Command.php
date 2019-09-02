<?php

namespace App\Command\Admin\Shop\Characteristic\Characteristic\Create;

use App\Http\Requests\Admin\Shop\Characteristic\Characteristic\CreateRequest;

class Command
{
    public $name; 
    public $type; 
    public $required; 
    public $default; 
    public $sort;

    public function __construct(CreateRequest $request)
    {
        $this->name = $request->name;
        $this->type = $request->type;
        $this->required = $request->required;
        $this->default = $request->default;
        $this->sort = $request->sort;
    }
}