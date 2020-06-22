<?php

namespace App\Command\Cabinet\Comparison\Create;

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
        $this->comparisonItems->create(
            $command->userId,
            $command->productId
        );
    }
}