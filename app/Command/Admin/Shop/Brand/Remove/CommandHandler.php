<?php

namespace App\Command\Admin\Shop\Brand\Remove;

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
        $this->brands->remove($command->brand);
    }
}