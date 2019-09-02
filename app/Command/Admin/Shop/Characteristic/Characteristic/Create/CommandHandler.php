<?php

namespace App\Command\Admin\Shop\Characteristic\Characteristic\Create;

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
        $this->characteristics->create(
            $command->name, $command->type,
            $command->required, $command->default,
            $command->sort
        );
    }
}