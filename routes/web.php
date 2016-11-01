<?php

use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function (){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My first post 2', 'body'=>'Laravel body 2']);
    $user->posts()->save($post);

});



Route::get('/read', function (){
    $user = User::findOrFail(1);
//    dd($user->posts);
//    dd($user);

    foreach ($user->posts as $post){
        echo $post->title . "<br>";
    }
});



Route::get('/update', function(){
    $user = User::find(1);

//    $user->posts()->where('id','=','2')->update(['title'=>'title - updated field 2', 'body'=>'body - updated field 2']);
    $user->posts()->whereId(1)->update(['title'=>'title - updated field', 'body'=>'body - updated field']);

});



Route::get('/delete', function (){
    $user = User::find(1);

    $user->posts()->whereId(2)->delete();
//    $user->posts()->delete();
});
