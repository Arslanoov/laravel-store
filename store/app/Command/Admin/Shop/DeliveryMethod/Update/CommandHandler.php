<?php

namespace App\Command\Admin\Shop\DeliveryMethod\Update;

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
        $this->methods->update(
            $command->deliveryMethod,
            $command->name, $command->cost,
            $command->minWeight, $command->maxWeight,
            $command->sort
        );
    }
}