<?php

namespace App\Command\Admin\Shop\DeliveryMethod\Remove;

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
        $this->methods->remove($command->deliveryMethod);
    }
}