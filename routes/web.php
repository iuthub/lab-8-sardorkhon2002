<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;

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

Route::get('/', [
    'uses' => 'PostsController@getIndex',
    'as' => 'blogIndex'
]);


Route::get('/posts/{id}', [
    'uses' => 'PostsController@getBlogPost',
    'as' => 'blogPost'
]);

Route::get('/postsByTitle/{title}', [
    'uses' => 'PostsController@getBlogPostByTitle',
    'as' => 'blogPostByTitle'
]);

Route::get('/about', [
    'uses' => 'PostsController@getOthersAbout',
    'as' => 'othersAbout'
]);


Route::group([
    'prefix'=>'admin'
], function(){

    Route::get('/', [
        'uses' => 'PostsController@getAdminIndex',
        'as'=> 'adminIndex'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'PostsController@getAdminEdit',
        'as' => 'adminEdit'
    ]);


    Route::post('/edit', [
        'uses' => 'PostsController@postAdminEdit',
        'as' => 'adminEditPost'
    ]);


    Route::get('/create', [
        'uses' => 'PostsController@getAdminCreate',
        'as' => 'adminCreate'
    ]);

    Route::post('/create', [
        'uses' => 'PostsController@postAdminCreate',
        'as' => 'adminCreatePost'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'PostsController@getAdminDelete',
        'as' => 'adminDelete'
    ]);

});
