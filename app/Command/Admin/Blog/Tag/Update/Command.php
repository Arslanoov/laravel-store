<?php

namespace App\Command\Admin\Blog\Tag\Update;

use App\Entity\Blog\Tag;
use App\Http\Requests\Admin\Blog\Tag\UpdateRequest;

class Command
{
    public $name;
    public $slug;

    public $tag;

    public function __construct(Tag $tag, UpdateRequest $request)
    {
        $this->name = $request->name;
        $this->slug = $request->slug;
        $this->tag = $tag;
    }
}