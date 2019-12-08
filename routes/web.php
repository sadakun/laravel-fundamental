<?php

use App\User;
use App\Post;
use App\Role;
use App\Country;
use App\Photo;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
    // $user = Auth::user();
    // if ($user->isAdmin()) {
    //     echo "This user is administrator";
    // }
    // if (Auth::check()) {
    //     return "The user is logged in";
    // }
});


Route::group(['middleware' => 'web'], function () {
    Route::resource('/posts', 'PostsController');
});

// Route::get('/dates', function () {
//     $date = new DateTime('+1 week');
//     echo $date->format('d-m-Y');

//     echo '<br>';
//     echo Carbon::now()->addDays(366)->diffForHumans();

//     echo '<br>';
//     echo Carbon::now()->subMonths(2)->diffForHumans();

//     echo '<br>';
//     echo Carbon::now()->yesterday()->diffAsCarbonInterval();
// });
// accessor
// Route::get('/getname', function () {
//     $user = User::find(1);
//     echo $user->name;
// });
// mutator
// Route::get('/setname', function () {
//     $user = User::find(1);
//     $user->name = "Marco";
//     $user->save();
// });

// // Route::get('/postController', 'PostsController@index');
// ###########################################################################
// ##                              Raw SQL CRUD                             ##
// ###########################################################################
// /*
// |--------------------------------------------------------------------------
// | Create
// |--------------------------------------------------------------------------
// */
// Route::get('/raw-insert', function () {
//     DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel is awesome with Edwin', 'Laravel is the best thing that has happened to PHP, PERIOD']);
// });

// /*
// |--------------------------------------------------------------------------
// | Read
// |--------------------------------------------------------------------------
// */
// Route::get('/raw-read', function () {
//     $results = DB::select('select * from posts where id = ?', [1]);
//     return var_dump($results);
//     // or
//     // foreach($results as $post){
//     //    return $post->title;
//     // }
// });

// /*
// |--------------------------------------------------------------------------
// | Update
// |--------------------------------------------------------------------------
// */
// Route::get('/raw-update', function () {
//     $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);
//     return $updated;
// });

// /*
// |--------------------------------------------------------------------------
// | Delete
// |--------------------------------------------------------------------------
// */
// Route::get('/raw-delete', function () {
//     $deleted = DB::delete('delete from posts where id = ?', [1]);
//     return $deleted;
// });

// ###########################################################################
// ##                             Eloquent CRUD                             ##
// ###########################################################################

// /*
// |--------------------------------------------------------------------------
// | Create
// |--------------------------------------------------------------------------
// */
// Route::get('/basicinsert', function () {
//     $post = new Post;
//     $post->title = 'Insert new Title';
//     $post->content = 'Inser new content';
//     $post->save();
// });

// Route::get('/basicinsert2', function () {
//     $post = Post::find(2);
//     $post->title = 'New Title 2';
//     $post->content = 'New Content 2 it is eloquent';
//     $post->save();
// });

// Route::get('/create', function () {
//     Post::create(['title' => 'the create method 2', 'content' => 'Hell yeah,this content is awsome']);
// });
// /*
// |--------------------------------------------------------------------------
// | Read
// |--------------------------------------------------------------------------
// */
// Route::get('/read', function () {
//     $posts = Post::all();
//     foreach ($posts as $post) {
//         return $post->title;
//     }
// });

// Route::get('/find', function () {
//     $posts = Post::find(2);
//     //   return $post->title;
//     //   or
//     foreach ($posts as $post) {

//         return $post->title;
//     }
// });

// Route::get('/findwhere', function () {
//     $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();
//     return  $posts;
// });

// Route::get('/findmore', function () {
//     //   $posts = Post::findOrFail(1);
//     //   return $posts;
//     //   or
//     $posts = Post::where('users_count', '<', 50)->firstOrFail();
// });

// /*
// |--------------------------------------------------------------------------
// | Update
// |--------------------------------------------------------------------------
// */
// Route::get('/update', function () {
//     Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'NEW TITLE', 'content' => 'Samuel is Awsome']);
// });

// /*
// |--------------------------------------------------------------------------
// | Delete
// |--------------------------------------------------------------------------
// */
// Route::get('/delete', function () {
//     $post = Post::find(4);
//     $post->delete();
// });

// Route::get('/delete2', function () {
//     Post::destroy([4, 5]);
//     //   Post::where('is_admin', 0)->delete();
// });

// /*
// |--------------------------------------------------------------------------
// | Soft Delete
// |--------------------------------------------------------------------------
// */
// Route::get('/softdelete/{id}', function ($id) {
//     Post::find($id)->delete();
// });

// /*
// |--------------------------------------------------------------------------
// | Read/Retrieving Softdeletes
// |--------------------------------------------------------------------------
// */
// Route::get('/readsoftdelete', function () {
//     $post = Post::find(1);
//     //return $post;

//     // Post::withTrashed()->where('id', 1)->get();
//     // or
//     Post::onlyTrashed()->where('is_admin', 0)->get();
//     return $post;
// });

// /*
// |--------------------------------------------------------------------------
// | Restoring Trashed Record/Deleted
// |--------------------------------------------------------------------------
// */
// Route::get('/restore/{id}', function ($id) {
//     Post::withTrashed()->where('id', $id)->restore();
// });

// /*
// |--------------------------------------------------------------------------
// | Force Delete or Deleting From Softdeletes Permanently
// |--------------------------------------------------------------------------
// */
// Route::get('/forcedelete', function () {
//     // Post::withTrashed()->where('is_admin', 0)->forceDelete();
//     // or
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

// ###########################################################################
// ##                            Eloquent RELATIONSHIP                      ##
// ###########################################################################

// /*
// |--------------------------------------------------------------------------
// | Eloquent One to One
// |--------------------------------------------------------------------------
// */
// Route::get('/user/{id}/post', function ($id) {
//     $title = User::find($id)->post->title;
//     $content = User::find($id)->post->content;
//     return $title . "" . $content;
// });

// Route::get('/post/{id}/user', function ($id) {
//     return Post::find($id)->user->name;
// });

// /*
// |--------------------------------------------------------------------------
// | Eloquent One to Many
// |--------------------------------------------------------------------------
// */
// Route::get('/posts', function () {
//     $user = User::find(1);
//     foreach ($user->posts as $post) {
//         echo $post->title . "<br>";
//     }
// });

// /*
// |--------------------------------------------------------------------------
// | Eloquent Many to Many
// |--------------------------------------------------------------------------
// */
// Route::get('/user/{id}/role', function ($id) {
//     //$user = User::find($id);
//     //or
//     $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
//     // foreach ($user->roles as $role) {
//     //     return $role->name;
//     // }
//     return $user;
// });

// /*
// |--------------------------------------------------------------------------
// | Accessing The Intermediate Table/Pivot
// |--------------------------------------------------------------------------
// */
// Route::get('user/pivot', function () {
//     $user = User::find(1);
//     foreach ($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }
// });

// Route::get('/user/country', function () {
//     $country = Country::find(1);
//     foreach ($country->posts as $post) {
//         return $post->title;
//     }
// });

// /*
// |--------------------------------------------------------------------------
// | Polymorphic Relations
// |--------------------------------------------------------------------------
// */
// Route::get('/user/photos', function () {


//     $user = User::find(1);
//     foreach ($user->photos as $photo) {
//         return $photo;
//     }
// });
// Route::get('/post/{id}/photos', function ($id) {


//     $post = Post::find($id);
//     foreach ($post->photos as $photo) {
//         return $photo;
//     }
// });
// Route::get('/photo/{id}/post', function ($id) {
//     $photo = Photo::findOrFail($id);
//     return $photo->imageable;
// });

// /*
// |--------------------------------------------------------------------------
// | Polymorphic Many to Many
// |--------------------------------------------------------------------------
// */
// Route::get('/post/tag', function () {
//     $post = Post::find(1);
//     foreach ($post->tags as $tag) {
//         echo $tag->name;
//     }
// });

// Route::get('/tag/post', function () {
//     $tag = Tag::find(2);
//     // return $tag->posts;
//     foreach ($tag->posts as $post) {
//         echo $post->title;
//     }
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// to use IsAdmin middleware or call it in controller
Route::get('/admin/user/roles', ['middleware' => ['role', 'auth', 'web'], function () {
    return "Middleware role";
}]);

Route::get('/admin', 'AdminController@index');
