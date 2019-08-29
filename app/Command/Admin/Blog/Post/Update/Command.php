<?php

namespace App\Command\Admin\Blog\Post\Update;

use App\Entity\Blog\Post\Post;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;

class Command
{
    public $categoryId;
    public $title;
    public $slug;
    public $description;
    public $content;
    public $photo;

    public $post;

    public function __construct(UpdateRequest $request, Post $post)
    {
        $this->categoryId = $request->category;
        $this->title = $request->title;
        $this->slug = $request->slug;
        $this->description = $request->description;
        $this->content = $request->text;
        $this->photo = $request->photo;
        $this->post = $post;
    }
}