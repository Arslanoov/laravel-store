<?php

namespace App\Widget\Blog;

use App\UseCases\Blog\CategoryService;
use Arrilot\Widgets\AbstractWidget;

class CategoriesWidget extends AbstractWidget
{
    protected $config = [];

    private $service;

    public function __construct(CategoryService $service, array $config = [])
    {
        parent::__construct($config);
        $this->service = $service;
    }

    public function run()
    {
        $categories = $this->service->getAllCategories();

        return view('widgets.blog.categories', compact('categories'));
    }
}