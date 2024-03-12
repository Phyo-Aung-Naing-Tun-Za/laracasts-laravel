<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog/{post}', function ($slug) {
    $url = __DIR__ . "/../resources/blogs/my-{$slug}-post.html";
    if(file_exists($url)){
        $post = file_get_contents($url);
        return view('blog',['post' => $post]);
    }else{
        return abort(404);
    }

})->where('post','[A-z_\-]+');
