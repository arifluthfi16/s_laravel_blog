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

// Main Index
Route::get('/', [
    "uses" => 'FrontEndController@index',
    'as' => 'index'
]);

// Single Post Index
Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

// Single Category Index
Route::get('/category/{id}', [
   'uses' => 'FrontEndController@category',
   'as' => 'category.single'
]);

Route::get('/tag/{id}',[
   'uses' => 'FrontEndController@tag',
   'as' => 'tag.single'
]);


Auth::routes();



Route::group(['prefix'=>'admin', 'middleware'=>['auth']],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/post/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'post.trashed'
    ]);

//    User Routes
    Route::get('user/not_admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not_admin'
    ])->middleware('admin');

    Route::get('user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ])->middleware('admin');

    Route::get('user/profile',[
       'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::post('user/profile/update', [
       'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

//    Post Soft Deletes
    Route::post('/post/kill/{id}',[
       'uses' => 'PostsController@kill',
       'as' => 'post.kill'
    ]);

    Route::post('/post/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

//    Site Settings
    Route::get('/settings', [
       'uses' => 'SettingsController@index',
       'as' => 'setting.index'
    ]);

    Route::post('/setting/update',[
       'uses' => 'SettingsController@update',
       'as' => 'setting.update'
    ]);



    Route::resource('post','PostsController');
    Route::resource('category','CategoryController');
    Route::resource('tag','TagsController');
    Route::resource('user', 'UsersController');

});
