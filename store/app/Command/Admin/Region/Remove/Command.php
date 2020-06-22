<?php

namespace App\Command\Admin\Region\Remove;

use App\Entity\Region;

class Command
{
    public $region;

    public function __construct(Region $region)
    {
        $this->region = $region;
    }
}