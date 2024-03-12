<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $results = Post::all();
    $posts  =  array_map(function($post){
        return $post->getContents();
    }, $results);

    return view('welcome',['posts' => $posts]);
});

Route::get('/blog/{post}', function ($slug) {
    return view('blog',['post' => Post::find($slug)]);
})->where('post','[A-z_\-]+');
