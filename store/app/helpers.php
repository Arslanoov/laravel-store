<?php

use App\Entity\Page;
use App\Http\Router\PagePath;

if (!function_exists('page_path')) {
    function page_path(Page $page)
    {
        return app()->make(PagePath::class)->withPage($page);
    }
}