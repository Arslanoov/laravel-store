<?php

namespace App\Command\Admin\Shop\Category\Update;

use App\Entity\Shop\Category;
use App\Http\Requests\Admin\Shop\Category\UpdateRequest;

class Command
{
    public $category;

    public $parent;
    public $name;
    public $slug;
    public $title;
    public $description;

    public function __construct(Category $category, UpdateRequest $request)
    {
        $this->category = $category;
        $this->parent = $request->parent;
        $this->name = $request->name;
        $this->slug = $request->slug;
        $this->title = $request->title;
        $this->description = $request->description;
    }
}