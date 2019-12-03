<?php

use App\User;
use App\Post;
use App\Role;
use App\Country;
use App\Photo;
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

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationship
|--------------------------------------------------------------------------
*/
// one to one relationship
Route::get('/user/{id}/post', function ($id) {
    $title = User::find($id)->post->title;
    $content = User::find($id)->post->content;
    return $title . "" . $content;
});

Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->user->name;
});
// end one to one relationship

// one to one relationship
Route::get('/posts', function () {
    $user = User::find(1);
    foreach ($user->posts as $post) {
        echo $post->title . "<br>";
    }
});
// end one to one relationship

// many to many realtionship
Route::get('/user/{id}/role', function ($id) {
    //$user = User::find($id);
    //or
    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
    // foreach ($user->roles as $role) {
    //     return $role->name;
    // }
    return $user;
});
// end many to many realtionship

// accessing pivot table
Route::get('user/pivot', function () {
    $user = User::find(1);
    foreach ($user->roles as $role) {
        echo $role->pivot->created_at;
    }
});
// end

Route::get('/user/country', function () {
    $country = Country::find(1);
    foreach ($country->posts as $post) {
        return $post->title;
    }
});

// polymorphic Relation
Route::get('/user/photos', function () {


    $user = User::find(1);
    foreach ($user->photos as $photo) {
        return $photo;
    }
});
Route::get('/post/{id}/photos', function ($id) {


    $post = Post::find($id);
    foreach ($post->photos as $photo) {
        return $photo;
    }
});
Route::get('/photo/{id}/post', function ($id) {
    $photo = Photo::findOrFail($id);
    return $photo->imageable;
});
