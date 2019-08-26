<?php

namespace App\Command\Admin\Blog\Category\Update;

use App\Entity\Blog\Category;
use App\Http\Requests\Admin\Blog\Category\UpdateRequest;

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