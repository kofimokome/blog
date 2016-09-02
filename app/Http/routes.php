<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['middleware' => ['web']], function () {
    //session()->put('msg','Welcome to this page');
    //Routes for the various pages of the website
    Route::get('/', 'PagesController@getIndex');

    Route::get('contact', 'PagesController@getContact');

    Route::get('services', 'PagesController@getServices');

    Route::get('products','PagesController@getProducts');

    Route::get('blog', ['as'=>'blog','uses'=>'PagesController@getBlog']);
    //           -- Routes ends here  --

    //Unknown
    Route::auth();
    //   -- Unknown Ends here--

    //Routes for the Posts
    Route::resource('posts','PostController');

    //routes for the tags
    Route::resource('tags','TagController');

    //Routes for the categories
    Route::resource('categories','CategoryController');

    //Routes for comments
    Route::resource('comments','CommentController',['except'=>['create','show','index']]);

    //Routes for users
    Route::resource('users','UserController',['except'=>['create','store']]);
    Route::get('viewuser/{id}',['as'=>'viewuser.single','uses'=>'UserController@admin']);

    //Routes for notifications
    Route::resource('notifications','NotificationController',['except'=>['update','edit','show']]);

    //Routes for the contact form
    Route::resource('contacts','ContactController',['except'=>['update','edit']]);

    //Routes for messages
    Route::resource('messages','MessageController');

    //Routes for the slugs
    Route::get('/blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
});


//Route::get('/home', 'HomeController@index');
