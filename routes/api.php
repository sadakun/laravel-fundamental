<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/posts', 'PostsController');
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//
//Route::get('/about', function () {
//
//
//    return "Hi about page";
//
//
//});
//
//
//Route::get('/contact', function () {
//
//
//    return "hi I am contact";
//
//
//});
//
//Route::get('/post/{id}/{name}', function($id, $name){
//
//
//    return "This is post number ". $id . " " . $name;
//
//
//
//});
//
//Route::get('admin/posts/example', array('as'=>'admin.home' ,function(){
//
//    $url = route('admin.home');
//
//
//    return "this url is ". $url;
//
//}));



//Route::get('/post/{id}', 'PostsController@index');




// Route::resource('posts', 'PostsController');


//
//Route::get('/contact', 'PostsController@contact');
//
//
//
//Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');
