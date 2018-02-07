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


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/about', ['as' => 'about', function () {
//    return "Strona about Jakub";
//}]);
//
//Route::get('/contact', function () {
//    $url = route('about');
//
//    return "<html><head></head><body><a href=$url>About</a> </body></html>";
//});
//
//Route::get('/posts/{author}/{id}', ['as' => 'selectedPostOfAuthor', function ($author, $id) {
//    $str = "This is a super post nr: $id. " . ucfirst($author) . " wrote it!";
//
//    return "<html><head></head><body><p>$str</p></body></html>";
//}]);

//Route::get('/post/{id?}', 'PostsController@index')->name('post');

Route::resource('posts', 'PostsController');