<?php

Auth::routes();

Route::get('/', 'HomeController@main');

Route::get('/test', function () {
    return view('test');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/contact', 'MainController@contact');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'BlogController@index')->name('blog_home');
    Route::get('/gallery', 'BlogController@gallery');

    Route::get('/{page}', 'BlogController@page');
    Route::get('/post/{slug}', 'PostController@show')->name('post');

    Route::get('/category/{name}', 'CategoryController@show');

    Route::post('/comment', 'CommentController@create');
});

Route::group(['prefix' => 'management', 'middleware' => ['auth']], function () {
    Route::get('/', 'Admin\AdminController@index');

    Route::get('/posts', 'Admin\PostController@index')->name('admin::posts.index');
    Route::get('/posts/{id}', 'Admin\PostController@show');
    Route::get('/post/create', 'Admin\PostController@create')->name('admin::posts.create');
    Route::post('/post/create', 'Admin\PostController@post')->name('admin::posts.create');
    Route::get('/post/edit/{id}', 'Admin\PostController@edit')->name('admin::posts.edit');
    Route::post('/post/edit', 'Admin\PostController@save');
    Route::get('/post/delete/{id}', 'Admin\PostController@delete')->name('admin::posts.delete');
    Route::get('/post/confirm', 'Admin\PostController@confirm_all');
    Route::get('/post/confirm/{id}', 'Admin\PostController@confirm')->name('admin::posts.confirm');

    Route::get('/categories', 'Admin\CategoryController@index')->name('admin::categories.index');
    Route::get('/categories/{id}', 'Admin\CategoryController@show')->name('admin::categories.show');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('admin::category.create');
    Route::post('/category/create', 'Admin\CategoryController@post')->name('admin::category.create');
    Route::get('/categories/edit/{id}', 'Admin\CategoryController@edit')->name('admin::categories.edit');
    Route::post('/categories/edit', 'Admin\CategoryController@save')->name('admin::categories.edit');
    Route::get('/category/delete/{id}', 'Admin\CategoryController@delete')->name('admin::category.delete');

    Route::get('/comments', 'Admin\CommentController@index')->name('admin::comments.index');
    Route::get('/comment/delete/{id}', 'Admin\CommentController@delete')->name('admin::comment.delete');
    Route::get('/comment/confirm', 'Admin\CommentController@confirm_all')->name('admin::comment.confirm_all');
    Route::get('/comment/confirm/{id}', 'Admin\CommentController@confirm')->name('admin::comment.confirm');

    Route::get('/quotes', 'Admin\QuoteController@index')->name('admin::quotes.index');
    Route::get('/quote/create', 'Admin\QuoteController@create')->name('admin::quote.create');
    Route::post('/quote/create', 'Admin\QuoteController@post')->name('admin::quote.create');
    Route::post('/quote/edit{id}', 'Admin\QuoteController@edit')->name('admin::quote.edit');
    Route::get('/quote/delete/{id}', 'Admin\QuoteController@delete')->name('admin::quote.delete');
});

Route::group(['prefix' => 'bot'], function () {
    Route::get('/info', 'Bot\TelegramController@info');
    Route::get('/set', 'Bot\TelegramController@set_web_hook');
});

Route::post('/531370522:AAHYvRhHW7Y2HRIOQszk5MfsZTbJNsy29Dw/webhook', 'Bot\Telegramcontroller@web_hook');