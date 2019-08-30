<?php

namespace App\ReadRepository;

use App\Entity\Page;

class PageReadRepository
{
    public function find($id): ?Page
    {
        $page = Page::find($id);
        return $page;
    }

    public function findAll()
    {
        $pages = Page::defaultOrder()->withDepth()->get();
        return $pages;
    }

    public function findAllPaginate()
    {
        $pages = Page::defaultOrder()->withDepth();
        return $pages;
    }


    public function findSiblings(Page $page)
    {
        $siblings = $page->siblings()->defaultOrder()->first();
        return $siblings;
    }

    public function findSiblingsDesc(Page $page)
    {
        $siblings = $page->siblings()->defaultOrder('desc')->first();
        return $siblings;
    }
}