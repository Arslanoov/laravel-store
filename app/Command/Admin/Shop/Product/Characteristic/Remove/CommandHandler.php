<?php

namespace App\Command\Admin\Shop\Product\Characteristic\Remove;

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
        $this->characteristics->remove($command->characteristic);
    }
}