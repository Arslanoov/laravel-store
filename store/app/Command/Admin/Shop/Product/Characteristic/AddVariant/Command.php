<?php

namespace App\Command\Admin\Shop\Product\Characteristic\AddVariant;

use App\Entity\Shop\Product\Characteristic;
use App\Http\Requests\Admin\Shop\Product\Characteristic\CreateVariantRequest;

class Command
{
    public $variantId;

    public $characteristic;

    public function __construct(CreateVariantRequest $request, Characteristic $characteristic)
    {
        $this->variantId = $request->variant;
        $this->characteristic = $characteristic;
    }
}