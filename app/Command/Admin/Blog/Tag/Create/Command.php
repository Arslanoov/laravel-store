<?php

namespace App\Command\Admin\Blog\Tag\Create;

use App\Http\Requests\Admin\Blog\Tag\CreateRequest;

class Command
{
    public $name;
    public $slug;

    public function __construct(CreateRequest $request)
    {
        $this->name = $request->name;
        $this->slug = $request->slug;
    }
}