<?php

namespace App\Command\Admin\Shop\Product\Characteristic\Create;

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
        $this->characteristics->create(
            $command->productId,
            $command->characteristicId
        );
    }
}