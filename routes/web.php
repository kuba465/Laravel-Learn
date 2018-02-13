<?php

use App\Country;
use App\Photo;
use App\Post;
use App\Tag;
use App\User;
use App\Role;

/*
|--------------------------------------------------------------------------
| Basic Routes
|--------------------------------------------------------------------------
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
//my excercise
//Route::get('/contactNew/{number}', 'PostsController@contactNew');
//Route::get('/showPostNew/{title}/{content}', 'PostsController@showPostNew');


/*
|--------------------------------------------------------------------------
| Database - Raw SQL
|--------------------------------------------------------------------------
*/

//insert datas with binding to db
//Route::get('/insert/{title}/{content}', function ($title, $content) {
//    DB::insert('insert into posts(title, content) values(?, ?)', [$title, $content]);
//});


//select all/some datas from db
//binding for few ways
//Route::get('/read', function () {
//    $result = DB::select('select * from posts where id = :id', ['id' => 4]);
////    $result = DB::select('select * from posts');
//    foreach ($result as $post) {
//        echo "<h1 style='display: inline'>Title:</h1> " . $post->title . "<br>";
//        echo "<h3 style='display: inline; margin-bottom: 5px'>Content:</h3> " . $post->content;
//    }
//
//    //return $result;
//});


//update datas from db
//Route::get('/update', function () {
//    $updated = DB::update('update posts set title = "Super Zmieniony post" where id = :id', ['id' => 4]);
//
//    return $updated;
//});
//
//
//insert datas from form
////my excercise, wrong names of views and url,
////because first idea was to update datas from db
//Route::get('/updateForm', function () {
//    return view('updateForm');
//});
//
//Route::post('/updateFromForm', 'PostsController@updateFromForm');
//
//
////delete sth from db
//Route::get('delete', function () {
//    $deleted = DB::delete('delete from posts where id = ?', [1]);
//
//    return $deleted;
//});


/*
|--------------------------------------------------------------------------
| Database - ORM Eloquent
|--------------------------------------------------------------------------
*/

//search for all posts
//Route::get('/read', function () {
//    $posts = Post::all();
//
//    foreach ($posts as $post) {
//        echo $post->title;
//    }
//});


//search for only one post
//Route::get('/find', function (){
//   $post = Post::find(2);
//
//   dump($post);
//});


//search for datas in db with conditions
//Route::get('findWithConditions', function (){
//   $posts = Post::where('id', 2)->orderby('id', 'desc')->get();
//
//
//
//   return $posts;
//});


//more searching with conditions
//Route::get('findMore', function (){
////     $posts = Post::findOrFail(1);
////
////     return $posts;
//
//    $posts = Post::where('users_count', '<', 50)->firstOrFail();
//});


//add some record to db with ORM
//Route::get('/basicInsert', function (){
//   $post = new Post();
//
//   $post->title = 'Second ORM title insert';
//   $post->content = 'Eloquent is really cool. Look at this content';
//   $post->save();
//
//});


//update rows
//Route::get('basicinsert2', function () {
//    $post = Post::find(2);
//
//    $post->title = 'Edited post number ' . $post->id;
//    $post->content = 'I can update records in db';
//
//    $post->save();
//});


//method to insert data into database
//to use it you must go to model and create $fillable
//in this variable you must put datas that an be saved...(Edwin will explain it to me later)
//Route::get('create', function (){
//    Post::create([
//        'title'=>'the create method',
//        'content'=>'wow I am learning a lot with Edwin Diaz'
//    ]);
//});


//update datas in db
//Route::get('basicUpdate', function () {
//    Post::where('id', 5)->where('is_admin', 0)->update([
//        'title' => 'new PHP title',
//        'content' => 'I love my instructor Edwin Diaz'
//    ]);
//});


//delete datas using Orm
//Route::get('basicDelete', function (){
//   $post = Post::find(6);
//
//   $post->delete();
//});

//second way to delete
//Route::get('basicDeleteSecond', function(){
//    Post::destroy(4);
//
//    //if you want to delete all
//    Post::truncate();
//
//    //my idea was to get all records by using all() method
//    //then foreach for all and write ids to array
//    //and then you can put array in destroy method like this
//    //Post::destroy($array);
//});


/*
|--------------------------------------------------------------------------
| Database - ORM Eloquent - Soft Delete
|--------------------------------------------------------------------------
*/

//delete record by add timestamp to column deleted_at
//before I used it I had to make migration to add this to db
//Route::get('softDelete', function () {
////    Post::find(1)->delete();
//    Post::find(2)->delete();
//});


//select deleted records
//Route::get('readSoftDelete', function () {
//    //this way you have a blank page without error, but not object
////    $post = Post::find(1);
////    return $post;
//
//    //how to get deleted rows
////    $post = Post::withTrashed()->where('id', 1)->get();
////    return $post;
//
//    //this the way to get only deleted rows
//    $posts = Post::onlyTrashed()->get();
//    return $posts;
//
//    //this return 5 rows from db, but without deleted
////    $posts = Post::all()->take(5);
////    return $posts;
//});


//how to restore deleted rows
//Route::get('restoreSoftDeleted', function () {
//    Post::withTrashed()->where('id', 1)->restore();
//});


//how to delete datas permanently
//Route::get('forceDelete', function () {
////    Post::withTrashed()->where('id', 2)->forceDelete();
//
//    //better to use in this case is this code because I want to delete only trashed rows
//    Post::onlyTrashed()->where('id', 2)->forceDelete();
//});


/*
|--------------------------------------------------------------------------
| Database - ORM Eloquent - Relationships
|--------------------------------------------------------------------------
*/

//One to One relationship
//Route::get('user/{id}/post', function ($id) {
//    $user = User::find($id);
//    return $user->post;
//
//    //second way
//    //return User::find($id)->post;
//});

//inversed = belongsTo in Post model
//Route::get('post/{id}/user', function ($id) {
//    return Post::find($id)->user;
//
//    //second way
//    $post = Post::find($id);
//    return $post->user;
//});


//One To Many
//Route::get('posts', function () {
//    $user = User::find(1);
//
//    foreach ($user->posts as $post) {
//        echo $post->title . "<br>";
//    }
//});
//inversed is of course the same as in One to one relatioship
//because post has only one user, so there again should be belongsTo


//Many To Many
//Route::get('user/{id}/role', function ($id){
//    return User::find($id)->roles;
//});
//
//Route::get('role/{id}/user', function ($id){
//    return Role::find($id)->users()->orderBy('id', 'desc')->get();
//});


//Accessing to intermediate/pivot table
//Route::get('user/pivot', function () {
//    $user = User::find(1);
//    foreach ($user->roles as $role) {
//        //I had to add a "withPivot" method in User model, because without it return was only user_id and role_id
//        echo $role->pivot;
//    }
//});


//Get country of post by going through user table
//the point is that country table has not foreign key to post table
//you must go through user table and get this by using "hasManyThrough" method
//Route::get('user/country', function () {
//    $country = Country::find(1);
//    foreach ($country->posts as $post) {
//        return $post->title;
//    }
//});


//Polymorphic relation
Route::get('user/photos', function (){
    $user = User::find(1);

    foreach ($user->photos as $photo) {
        return $photo;
    }
});

Route::get('post/photos', function (){
    $post = Post::find(1);

    foreach ($post->photos as $photo) {
        return $photo;
    }
});


//Inverse polymorphic relation
Route::get('photo/{id}', function ($id){
    $photo = Photo::findOrFail($id);

    echo $photo->imageable;
});


//Polymorphic Many to Many
Route::get('post/{id}/tag', function ($id){
   $post = Post::find($id);

    foreach ($post->tags as $tag) {
        echo $tag;
   }
});

Route::get('tag/{id}', function ($id){
   $tag = Tag::find($id);

    foreach ($tag->posts as $post) {
        echo $post;
   }
});