<?php

namespace App\Command\Admin\Shop\Characteristic\Variant\Remove;

use App\Entity\Shop\Characteristic\Variant;

class Command
{
    public $variant;

    public function __construct(Variant $variant)
    {
        $this->variant = $variant;
    }
}