<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', function () {
        $compact['__about_slides'] = app(\App\Contracts\Repositories\SlideRepository::class)
            ->getDataByCategory(config('common.about.limit'), -1);
        $compact['__about_teams'] = app(\App\Contracts\Repositories\ContactRepository::class)->getTeams(
                config('common.contact.limit'),
                ['first_name', 'company', 'avatar', 'message']
            );
        return view('frontend.page.about', $compact);
    })->name('about');
    Route::get('/contact', function () {
        return view('frontend.page.contact', ['disableIconContact' => true]);
    })->name('contact');
    Route::post('home/contact', 'HomeController@storeContact')->name('home.store.contact');

    Route::get('/blog', 'PostController@index')->name('blog');
    Route::get('/blog/{slug}', 'PostController@show')->name('blog.show');
    Route::get('category/{slug}', 'CategoryController@show')->name('category.show');
});

Route::group(['namespace' => 'Backend'], function () {
    Auth::routes();
    Route::group(['prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth']], function () {
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::get('/home/{contact}/edit', 'HomeController@edit')->name('home.edit');
        Route::patch('/home/{contact}', 'HomeController@update')->name('home.update');
        Route::delete('home/{contact}', 'HomeController@destroy')->name('home.destroy');
        Route::get('contact/create', 'HomeController@create')->name('home.create');
        Route::post('contact', 'HomeController@store')->name('home.store');
        Route::post('summernote/image', 'HomeController@summernoteImage')->name('summernote.image');
        Route::resource('user', 'UserController');
        Route::resource('category', 'CategoryController', [
            'except' => ['index', 'create', 'show']
        ]);
        Route::get('category/type/{type}', 'CategoryController@type')->name('category.type');
        Route::resource('post', 'PostController');
        Route::resource('product', 'ProductController');
        Route::resource('slide', 'SlideController');
        Route::resource('menu', 'MenuController', [
            'except' => ['show', 'create']
        ]);
        Route::post('menu/serialize', 'MenuController@serialize')->name('menu.serialize');
        Route::resource('config', 'ConfigController', [
            'only' => ['index', 'store']
        ]);
    });
});
