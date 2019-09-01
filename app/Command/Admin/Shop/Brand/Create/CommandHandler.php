<?php

namespace App\Command\Admin\Shop\Brand\Create;

use App\Repository\Shop\BrandRepository;

class CommandHandler
{
    private $brands;

    public function __construct(BrandRepository $brands)
    {
        $this->brands = $brands;
    }

    public function __invoke(Command $command)
    {
        $this->brands->create(
            $command->name,
            $command->slug,
            $command->description
        );
    }
}