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


//Route::get('/', function () {
//    return view('welcome');
//});

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

//Route::resource('posts', 'PostsController');

//Route::get('/contact', 'PostsController@contact');
//
//Route::get('/post/{id}/{name}/{password}', 'PostsController@showPost');
//
//Route::get('/contactNew/{number}', 'PostsController@contactNew');
Route::get('/showPostNew/{title}/{content}', 'PostsController@showPostNew');


Route::get('/insert/{title}/{content}', function ($title, $content){
    DB::insert('insert into posts(title, content) values(?, ?)', [$title, $content]);
});

Route::get('/read', function () {
    $result = DB::select('select * from posts where id = :id', ['id' => 4]);
//    $result = DB::select('select * from posts');
    foreach ($result as $post) {
        echo "<h1 style='display: inline'>Title:</h1> " . $post->title . "<br>";
        echo "<h3 style='display: inline; margin-bottom: 5px'>Content:</h3> " . $post->content;
    }

    //return $result;
});

Route::get('/update', function () {
    $updated = DB::update('update posts set title = "Super Zmieniony post" where id = :id', ['id' => 4]);

    return $updated;
});


//update datas from form

Route::get('/updateForm', function (){
    return view('updateForm');
});

Route::post('/updateFromForm', 'PostsController@updateFromForm');


Route::get('delete', function (){
    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;
});