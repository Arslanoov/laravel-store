<?php

namespace App\Command\Admin\Shop\Characteristic\Characteristic\Update;

use App\Repository\Shop\Characteristic\CharacteristicRepository;

class CommandHandler
{
    private $characteristics;

    public function __construct(CharacteristicRepository $characteristics)
    {
        $this->characteristics = $characteristics;
    }

    public function __invoke(Command $command)
    {
        $this->characteristics->update(
            $command->characteristic,
            $command->name, $command->type,
            $command->required, $command->default,
            $command->sort
        );
    }
}