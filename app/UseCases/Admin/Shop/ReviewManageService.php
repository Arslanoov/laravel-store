<?php

namespace App\UseCases\Admin\Shop;

use App\Command\CommandBus;
use App\Query\QueryBus;
use App\Entity\Shop\Review;
use App\Http\Requests\Admin\Shop\Review\UpdateRequest;
use App\Command\Admin\Shop\Review\Update\Command as ReviewUpdateCommand;
use App\Command\Admin\Shop\Review\Remove\Command as ReviewRemoveCommand;
use App\Query\Shop\Review\Find\FindReviewsQuery;

class ReviewManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function update(UpdateRequest $request, Review $Review): void
    {
        $this->commandBus->handle(new ReviewUpdateCommand($Review, $request));
    }

    public function remove(Review $Review): void
    {
        $this->commandBus->handle(new ReviewRemoveCommand($Review));
    }

    public function getReviews()
    {
        $users = $this->queryBus->query(new FindReviewsQuery());
        return $users;
    }
}