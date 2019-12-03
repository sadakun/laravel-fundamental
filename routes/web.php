<?php

use App\User;
use App\Post;
use App\Role;
use App\Country;
use App\Photo;
use App\Tag;
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
| Soft Delete
|--------------------------------------------------------------------------
*/
Route::get('/softdelete/{id}', function ($id) {
    Post::find($id)->delete();
});
// retrieving softdelete
Route::get('/readsoftdelete', function () {
    $post = Post::find(1);
    //return $post;

    // Post::withTrashed()->where('id', 1)->get();
    // or
    Post::onlyTrashed()->where('is_admin', 0)->get();
    return $post;
});
#restoring trashed record/deleted
Route::get('/restore/{id}', function ($id) {
    Post::withTrashed()->where('id', $id)->restore();
});
#deleting from softdelete permanently
Route::get('/forcedelete', function () {
    // Post::withTrashed()->where('is_admin', 0)->forceDelete();
    // or
    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
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

// Polymorphic Many to Many
Route::get('/post/tag', function () {
    $post = Post::find(1);
    foreach ($post->tags as $tag) {
        echo $tag->name;
    }
});

Route::get('/tag/post', function () {
    $tag = Tag::find(2);
    // return $tag->posts;
    foreach ($tag->posts as $post) {
        echo $post->title;
    }
});
