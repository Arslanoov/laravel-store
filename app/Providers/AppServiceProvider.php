<?php

namespace App\Providers;

use App\Http\Router\PagePath;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        Route::model('page_path', PagePath::class);
    }
}
