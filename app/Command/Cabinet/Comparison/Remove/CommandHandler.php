<?php

namespace App\Command\Cabinet\Comparison\Remove;

use App\Repository\User\ComparisonRepository;

class CommandHandler
{
    private $comparisonItems;

    public function __construct(ComparisonRepository $comparisonItems)
    {
        $this->comparisonItems = $comparisonItems;
    }

    public function __invoke(Command $command)
    {
        $this->comparisonItems->remove($command->comparisonItem);
    }
}