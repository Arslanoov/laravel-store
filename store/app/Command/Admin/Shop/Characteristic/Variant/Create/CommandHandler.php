<?php

namespace App\Command\Admin\Shop\Characteristic\Variant\Create;

use App\Repository\Shop\Characteristic\VariantRepository;

class CommandHandler
{
    private $variants;

    public function __construct(VariantRepository $variants)
    {
        $this->variants = $variants;
    }

    public function __invoke(Command $command)
    {
        $this->variants->create(
            $command->characteristicId,
            $command->name
        );
    }
}