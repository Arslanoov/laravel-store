<?php

namespace App\Widget\Blog;

use App\UseCases\Blog\TagService;
use Arrilot\Widgets\AbstractWidget;

class TagsWidget extends AbstractWidget
{
    protected $config = [];

    private $service;

    public function __construct(TagService $service, array $config = [])
    {
        parent::__construct($config);
        $this->service = $service;
    }

    public function run()
    {
        $tags = $this->service->getAllTags();

        return view('widgets.blog.tags', compact('tags'));
    }
}