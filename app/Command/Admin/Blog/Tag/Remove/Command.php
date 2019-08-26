<?php

namespace App\Command\Admin\Blog\Tag\Remove;

use App\Entity\Blog\Tag;

class Command
{
    public $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }
}