<?php

namespace App\Command\Admin\Blog\Post\Create;

use App\Http\Requests\Admin\Blog\Post\CreateRequest;

class Command
{
    public $authorId;
    public $categoryId;
    public $title;
    public $slug;
    public $description;
    public $content;
    public $photo;

    public function __construct(CreateRequest $request, int $authorId)
    {
        $this->authorId = $authorId;
        $this->categoryId = $request->category;
        $this->title = $request->title;
        $this->slug = $request->slug;
        $this->description = $request->description;
        $this->content = $request->text;
        $this->photo = $request->photo;
    }
}