<?php

namespace App\UseCases\Admin;

use App\Command\CommandBus;
use App\Entity\Page;
use App\Http\Requests\Admin\Page\CreateRequest;
use App\Http\Requests\Admin\Page\UpdateRequest;
use App\Query\Page\Find\FindPageByIdQuery;
use App\Query\Page\Find\FindPageSiblingsDescQuery;
use App\Query\Page\Find\FindPageSiblingsQuery;
use App\Query\Page\Find\FindPagesPaginateQuery;
use App\Query\Page\Find\FindPagesQuery;
use App\Query\QueryBus;
use App\Command\Admin\Page\Create\Command as PageCreateCommand;
use App\Command\Admin\Page\Update\Command as PageUpdateCommand;
use App\Command\Admin\Page\Remove\Command as PageRemoveCommand;
use App\Command\Admin\Page\First\Command as PageFirstCommand;
use App\Command\Admin\Page\Up\Command as PageUpCommand;
use App\Command\Admin\Page\Down\Command as PageDownCommand;
use App\Command\Admin\Page\Last\Command as PageLastCommand;

class PageManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(CreateRequest $request)
    {
        $this->commandBus->handle(new PageCreateCommand($request));
    }

    public function update(UpdateRequest $request, Page $page)
    {
        $this->commandBus->handle(new PageUpdateCommand($request, $page));
    }

    public function remove(Page $page)
    {
        $this->commandBus->handle(new PageRemoveCommand($page));
    }

    public function first(Page $page, $first)
    {
        $this->commandBus->handle(new PageFirstCommand($page, $first));
    }

    public function up(Page $page)
    {
        $this->commandBus->handle(new PageUpCommand($page));
    }

    public function down(Page $page)
    {
        $this->commandBus->handle(new PageDownCommand($page));
    }

    public function last(Page $page, $last)
    {
        $this->commandBus->handle(new PageLastCommand($page, $last));
    }

    public function getPages()
    {
        $pages = $this->queryBus->query(new FindPagesQuery());
        return $pages;
    }

    public function getPagesPaginate()
    {
        $pages = $this->queryBus->query(new FindPagesPaginateQuery());
        return $pages;
    }

    public function getPage($pageId): ?Page
    {
        $page = $this->queryBus->query(new FindPageByIdQuery($pageId));
        return $page;
    }

    public function getSiblings(Page $page)
    {
        $siblings = $this->queryBus->query(new FindPageSiblingsQuery($page));
        return $siblings;
    }

    public function getSiblingsDesc(Page $page)
    {
        $siblings = $this->queryBus->query(new FindPageSiblingsDescQuery($page));
        return $siblings;
    }
}