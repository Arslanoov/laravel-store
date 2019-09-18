<?php

namespace App\Command\Admin\Shop\DeliveryMethod\Update;

use App\Entity\Shop\DeliveryMethod;
use App\Http\Requests\Admin\Shop\DeliveryMethod\UpdateRequest;

class Command
{
    public $name;
    public $cost;
    public $minWeight;
    public $maxWeight;
    public $sort;

    public $deliveryMethod;

    public function __construct(
        UpdateRequest $request,
        DeliveryMethod $deliveryMethod
    )
    {
        $this->name = $request->name;
        $this->cost = $request->cost;
        $this->minWeight = $request->min_weight;
        $this->maxWeight = $request->max_weight;
        $this->sort = $request->sort;
        $this->deliveryMethod = $deliveryMethod;
    }
}