<?php

namespace App\Command\Admin\Shop\Product\Photo\RemoveAll;

class Command
{
    public $photos;

    public function __construct($photos)
    {
        $this->photos = $photos;
    }
}