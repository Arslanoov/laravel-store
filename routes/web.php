<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::get('/storage/{filename}', function ($filename) {
    $path = storage_path() . '/app/public/' . $filename;

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
        Route::post('/filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    }
);

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
                Route::group(
                    [
                        'prefix' => 'categories/{category}',
                        'as' => 'categories.'
                    ],
                    function () {
                        Route::post('/first', 'CategoriesController@first')->name('first');
                        Route::post('/up', 'CategoriesController@up')->name('up');
                        Route::post('/down', 'CategoriesController@down')->name('down');
                        Route::post('/last', 'CategoriesController@last')->name('last');
                    }
                );

                Route::resource('posts', 'PostsController');
                Route::post('/posts/{post}/verify', 'PostsController@verify')->name('posts.verify');
                Route::post('/posts/{post}/draft', 'PostsController@draft')->name('posts.draft');
                Route::post('/posts/{post}/photo/delete', 'PostsController@photo')->name('posts.photo');

                Route::resource('comments', 'CommentsController');
                Route::post('/comments/{comment}/activate', 'CommentsController@activate')->name('comments.activate');
            }
        );

        Route::group(
            [
                'prefix' => 'shop',
                'as' => 'shop.',
                'namespace' => 'Shop',
                'middleware' => ['auth', 'can:manage-shop']
            ],
            function () {
                Route::resource('brands', 'BrandsController');

                Route::resource('characteristics', 'CharacteristicController');
                Route::group(
                    [
                        'prefix' => 'characteristics/{characteristic}',
                        'as' => 'characteristics.',
                        'namespace' => 'Characteristic',
                    ],
                    function () {
                        Route::resource('variants', 'VariantController');
                    }
                );

                Route::resource('categories', 'CategoriesController');
                Route::group(
                    [
                        'prefix' => 'categories/{category}',
                        'as' => 'categories.'
                    ],
                    function () {
                        Route::post('/first', 'CategoriesController@first')->name('first');
                        Route::post('/up', 'CategoriesController@up')->name('up');
                        Route::post('/down', 'CategoriesController@down')->name('down');
                        Route::post('/last', 'CategoriesController@last')->name('last');
                    }
                );

                Route::resource('products', 'Product\ProductsController');
                Route::group(
                    [
                        'prefix' => 'products/{product}',
                        'as' => 'products.',
                        'namespace' => 'Product',
                    ],
                    function () {
                        Route::post('/activate', 'ProductsController@activate')->name('activate');
                        Route::post('/draft', 'ProductsController@draft')->name('draft');
                        Route::post('/available', 'ProductsController@available')->name('available');
                        Route::post('/unavailable', 'ProductsController@unavailable')->name('unavailable');

                        Route::post('/photos/create', 'PhotosController@store')->name('photos.store');
                        Route::post('/photos/{photo}/remove', 'PhotosController@destroy')->name('photos.destroy');
                        Route::post('/photos/remove-all', 'PhotosController@destroyAll')->name('photos.destroyAll');

                        Route::get('/characteristics/create', 'CharacteristicsController@create')->name('characteristics.create');
                        Route::get('/characteristics/{characteristic}/add-variant', 'CharacteristicsController@addVariant')->name('characteristics.addVariant');
                        Route::post('/characteristics/store', 'CharacteristicsController@store')->name('characteristics.store');
                        Route::post('/characteristics/{characteristic}/store-variant', 'CharacteristicsController@storeVariant')->name('characteristics.storeVariant');
                        Route::post('/characteristics/{characteristic}/destroy', 'CharacteristicsController@destroy')->name('characteristics.destroy');
                    }
                );

                Route::resource('comments', 'CommentsController');
                Route::post('/comments/{comment}/activate', 'CommentsController@activate')->name('comments.activate');
            }
        );

        Route::resource('pages', 'PagesController');
        Route::group(
            [
                'prefix' => 'pages/{page}',
                'as' => 'pages.'
            ],
            function () {
                Route::post('/first', 'PagesController@first')->name('first');
                Route::post('/up', 'PagesController@up')->name('up');
                Route::post('/down', 'PagesController@down')->name('down');
                Route::post('/last', 'PagesController@last')->name('last');
            }
        );
    }
);

Route::get('/{page_path}', 'PagesController@show')->name('page')->where('page_path', '.+');
