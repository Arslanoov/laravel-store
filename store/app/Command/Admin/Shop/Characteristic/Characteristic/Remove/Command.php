<?php

namespace App\Command\Admin\Shop\Characteristic\Characteristic\Remove;

use App\Entity\Shop\Characteristic\Characteristic;

class Command
{
    public $characteristic;

    public function __construct(Characteristic $characteristic)
    {
        $this->characteristic = $characteristic;
    }
}