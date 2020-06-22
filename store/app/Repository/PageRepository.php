<?php

namespace App\Repository;

use App\Entity\Page;

class PageRepository
{
    public function create(
        $title, $slug, $menuTitle,
        $parentId, $description, $content
    ): Page
    {
        $page = Page::new(
            $title, $slug, $menuTitle,
            $parentId, $description, $content
        );

        return $page;
    }

    public function update(
        Page $page, $title, $slug,
        $menuTitle, $parentId,
        $description, $content
    )
    {
        $page->update([
            'title' => $title,
            'slug' => $slug,
            'menu_title' => $menuTitle,
            'parent_id' => $parentId,
            'description' => $description,
            'content' => $content,
        ]);
    }

    public function remove(Page $page): void
    {
        $page->delete();
    }

    public function first(Page $page, $first): void
    {
        $page->insertBeforeNode($first);
    }

    public function up(Page $page): void
    {
        $page->up();
    }

    public function down(Page $page): void
    {
        $page->down();
    }

    public function last(Page $page, $last): void
    {
        $page->insertAfterNode($last);
    }
}