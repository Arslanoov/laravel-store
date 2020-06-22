<?php

namespace App\Command\Admin\Shop\DeliveryMethod\Create;

use App\Http\Requests\Admin\Shop\DeliveryMethod\CreateRequest;

class Command
{
    public $name;
    public $cost;
    public $minWeight;
    public $maxWeight;
    public $sort;

    public function __construct(CreateRequest $request)
    {
        $this->name = $request->name;
        $this->cost = $request->cost;
        $this->minWeight = $request->min_weight;
        $this->maxWeight = $request->max_weight;
        $this->sort = $request->sort;
    }
}