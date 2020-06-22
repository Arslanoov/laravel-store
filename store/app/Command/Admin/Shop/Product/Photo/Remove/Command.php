<?php

namespace App\Command\Admin\Shop\Product\Photo\Remove;

use App\Entity\Shop\Product\Photo;

class Command
{
    public $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }
}