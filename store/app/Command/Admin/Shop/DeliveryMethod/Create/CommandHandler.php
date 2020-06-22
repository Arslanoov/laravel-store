<?php

namespace App\Command\Admin\Shop\DeliveryMethod\Create;

use App\Repository\Shop\DeliveryMethodRepository;

class CommandHandler
{
    private $methods;

    public function __construct(DeliveryMethodRepository $methods)
    {
        $this->methods = $methods;
    }

    public function __invoke(Command $command)
    {
        $this->methods->create(
            $command->name, $command->cost,
            $command->minWeight, $command->maxWeight,
            $command->sort
        );
    }
}