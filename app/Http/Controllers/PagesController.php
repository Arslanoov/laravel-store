<?php

namespace App\Http\Controllers;

use App\Http\Router\PagePath;

class PagesController extends Controller
{
    public function show(PagePath $path)
    {
        $page = $path->page;

        return view('pages.show', compact('page'));
    }
}