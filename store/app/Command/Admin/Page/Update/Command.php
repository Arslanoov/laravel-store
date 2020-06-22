<?php

namespace App\Command\Admin\Page\Update;

use App\Entity\Page;
use App\Http\Requests\Admin\Page\UpdateRequest;

class Command
{
    public $title;
    public $slug;
    public $menuTitle;
    public $parentId;
    public $description;
    public $text;

    public $page;

    public function __construct(UpdateRequest $request, Page $page)
    {
        $this->page = $page;
        $this->title = $request->title;
        $this->slug = $request->slug;
        $this->menuTitle = $request->menu_title;
        $this->parentId = $request->parentId;
        $this->description = $request->description;
        $this->text = $request->text;
    }
}