<?php

namespace App\Entity\Shop\Characteristic;

class CharacteristicData
{
    public $name;
    public $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}