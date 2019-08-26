<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::group(
    [
        'prefix' => 'cabinet',
        'as' => 'cabinet.',
        'namespace' => 'Cabinet',
        'middleware' => ['auth'],
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');
    }
);

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['auth', 'can:admin-panel'],
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('users', 'UsersController');
        Route::post('/users/{user}/verify', 'UsersController@verify')->name('users.verify');
        Route::post('/users/{user}/draft', 'UsersController@draft')->name('users.draft');

        Route::group(
            [
                'prefix' => 'blog',
                'as' => 'blog.',
                'namespace' => 'Blog',
                'middleware' => ['auth', 'can:manage-blog']
            ],
            function () {
                Route::resource('tags', 'TagsController');

                Route::resource('categories', 'CategoriesController');
            }
        );
    }
);