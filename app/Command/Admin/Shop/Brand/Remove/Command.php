<?php

namespace App\Command\Admin\Shop\Brand\Remove;

use App\Entity\Shop\Brand;

class Command
{
    public $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
}