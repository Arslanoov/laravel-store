<?php

namespace App\Command\Admin\Shop\Product\Characteristic\Create;

use App\Http\Requests\Admin\Shop\Product\Characteristic\CreateRequest;

class Command
{
    public $characteristicId;
    public $productId;

    public function __construct(CreateRequest $request, int $productId)
    {
        $this->characteristicId = $request->characteristic;
        $this->productId = $productId;
    }
}