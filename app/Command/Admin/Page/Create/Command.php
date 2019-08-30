<?php

namespace App\Command\Admin\Page\Create;

use App\Http\Requests\Admin\Page\CreateRequest;

class Command
{
    public $title;
    public $slug;
    public $menuTitle;
    public $parentId;
    public $description;
    public $text;

    public function __construct(CreateRequest $request)
    {
        $this->title = $request->title;
        $this->slug = $request->slug;
        $this->menuTitle = $request->menu_title;
        $this->parentId = $request->parentId;
        $this->description = $request->description;
        $this->text = $request->text;
    }
}