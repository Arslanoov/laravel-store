<?php

namespace App\Command\Admin\Shop\Product\Characteristic\AddVariant;

use App\Repository\Shop\Product\CharacteristicRepository;

class CommandHandler
{
    private $characteristics;

    public function __construct(CharacteristicRepository $characteristics)
    {
        $this->characteristics = $characteristics;
    }

    public function __invoke(Command $command)
    {
        $this->characteristics->addVariant(
            $command->characteristic,
            $command->variantId
        );
    }
}