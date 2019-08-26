<?php

namespace App\Command\Admin\Blog\Category\Create;

use App\Http\Requests\Admin\Blog\Category\CreateRequest;

class Command
{
    public $parent;
    public $name;
    public $slug;
    public $title;
    public $description;

    public function __construct(CreateRequest $request)
    {
        $this->parent = $request->parent;
        $this->name = $request->name;
        $this->slug = $request->slug;
        $this->title = $request->title;
        $this->description = $request->description;
    }
}