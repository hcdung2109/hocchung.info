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

/**
 * Router All Fontend
 */
Auth::routes();

Route::group(['namespace' => 'Blog', 'as' => 'blog.'], function (){

    // Home blog
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::get('category/{category}', 'HomeController@getArticlesOfCategory')->name('getArticlesOfCategory');
    Route::get('article/{article}', 'HomeController@getArticle')->name('getArticle');
    Route::get('tag/{tag}', 'HomeController@getArticlesOfTag')->name('getArticlesOfTag');
    Route::get('tutorial/{tutorial}', 'HomeController@tutorial')->name('tutorial');
});

/**
 * Router All Backend
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin','as' => 'admin.'], function (){

    // Auth
    Route::get('login','AuthController@showLoginForm')->name('login');
    Route::post('login','AuthController@login');
    Route::get('logout','AuthController@logout')->name('logout');

    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // USER
    Route::group(['prefix' => 'user', 'as' => 'user.' ], function () {
        Route::get('/','UserController@index')->middleware('permission:browse-user')->name('index');
        Route::get('create','UserController@create')->middleware('permission:create-user')->name('create');
        Route::post('store','UserController@store')->middleware('permission:store-user')->name('store');
        Route::get('edit/{user}','UserController@edit')->middleware('permission:edit-user')->name('edit');
        Route::put('update/{user}','UserController@update')->middleware('permission:update-user')->name('update');
        Route::get('{user}','UserController@show')->middleware('permission:show-user')->name('show');
        Route::delete('{id}','UserController@destroy')->middleware('permission:destroy-user')->name('destroy');
    });

    // CATEGORY
    Route::post('category/changeStatus/{category}','CategoryController@changeStatus')->name('category.changeStatus');
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/','CategoryController@index')->middleware('permission:browse-category')->name('index');
        Route::get('create','CategoryController@create')->middleware('permission:create-category')->name('create');
        Route::post('store','CategoryController@store')->name('store');
        Route::get('{category}/edit','CategoryController@edit')->middleware('permission:edit-category')->name('edit');
        Route::put('{category}','CategoryController@update')->name('update');
        Route::get('{category}','CategoryController@show')->middleware('permission:show-category')->name('update');
        Route::delete('{id}','CategoryController@destroy')->middleware('permission:destroy-category')->name('destroy');
    });

    // Tutorial
    Route::group(['prefix' => 'tutorial', 'as' => 'tutorial.'], function () {
        Route::get('/','TutorialController@index')->middleware('permission:browse-tutorial')->name('index');
        Route::get('create','TutorialController@create')->middleware('permission:create-tutorial')->name('create');
        Route::post('store','TutorialController@store')->name('store');
        Route::get('{tutorial}/edit','TutorialController@edit')->middleware('permission:edit-tutorial')->name('edit');
        Route::put('{tutorial}','TutorialController@update')->name('update');
        Route::get('{tutorial}','TutorialController@show')->middleware('permission:show-tutorial')->name('update');
        Route::delete('{id}','TutorialController@destroy')->middleware('permission:destroy-tutorial')->name('destroy');
    });

    // Article
    Route::post('article/changeStatus/{article}','ArticleController@changeStatus')->name('article.changeStatus');;
    Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
        Route::get('/','ArticleController@index')->middleware('permission:browse-article')->name('index');
        Route::get('create','ArticleController@create')->middleware('permission:create-article')->name('create');
        Route::post('/','ArticleController@store')->name('store');
        Route::get('{article}/edit','ArticleController@edit')->middleware('permission:edit-article')->name('edit');
        Route::put('{article}','ArticleController@update')->name('update');
        Route::get('{article}','ArticleController@show')->middleware('permission:show-article')->name('show');
        Route::delete('{id}','ArticleController@destroy')->middleware('permission:destroy-article')->name('destroy');
        Route::get('load-tutorial/{category_id}','ArticleController@loadTutorials')->name('load-tutorials');
    });

    // Tag Cloud
    Route::group(['prefix' => 'tag', 'as' => 'tag.'], function () {
        Route::get('/','TagController@index')->middleware('permission:browse-tag')->name('index');
        Route::get('create','TagController@create')->middleware('permission:create-tag')->name('create');
        Route::post('/','TagController@store')->name('store');
        Route::get('{tag}/edit','TagController@edit')->middleware('permission:edit-tag')->name('edit');
        Route::put('{id}','TagController@update')->name('update');
        Route::get('{tag}','TagController@show')->middleware('permission:show-tag')->name('show');
        Route::delete('{id}','TagController@destroy')->middleware('permission:destroy-tag')->name('destroy');
    });

    // PERMISSION
    Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {
        Route::get('/','PermissionController@index')->middleware('permission:browse-permission')->name('index');
        Route::get('create','PermissionController@create')->middleware('permission:create-permission')->name('create');
        Route::post('/','PermissionController@store')->middleware('permission:store-permission')->name('store');
        Route::get('edit/{permission}','PermissionController@edit')->middleware('permission:edit-permission')->name('edit');
        Route::put('{permission}','PermissionController@update')->middleware('permission:update-permission')->name('update');
        Route::get('{permission}','PermissionController@show')->middleware('permission:show-permission')->name('show');
        Route::delete('{id}','PermissionController@destroy')->middleware('permission:destroy-permission')->name('destroy');
    });

    // Role
    Route::get('role/attachPerms/{role}','RoleController@attachPerms')->name('role.attachPerms');
    Route::post('role/postAttachPerms/{role}','RoleController@postAttachPerms')->name('role.postAttachPerms');
    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
        Route::get('/','RoleController@index')->middleware('permission:browse-role')->name('index');
        Route::get('create','RoleController@create')->middleware('permission:create-role')->name('create');
        Route::post('/','RoleController@store')->middleware('permission:store-role')->name('store');
        Route::get('edit/{role}','RoleController@edit')->middleware('permission:edit-role')->name('edit');
        Route::put('{role}','RoleController@update')->middleware('permission:update-role')->name('update');
        Route::get('{role}','RoleController@show')->middleware('permission:show-role')->name('show');
        Route::delete('{id}','RoleController@destroy')->middleware('permission:destroy-role')->name('destroy');
    });

});


