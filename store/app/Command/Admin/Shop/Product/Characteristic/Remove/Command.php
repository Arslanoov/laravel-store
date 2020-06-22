<?php

namespace App\Command\Admin\Shop\Product\Characteristic\Remove;

use App\Entity\Shop\Product\Characteristic;

class Command
{
    public $characteristic;

    public function __construct(Characteristic $characteristic)
    {
        $this->characteristic = $characteristic;
    }
}