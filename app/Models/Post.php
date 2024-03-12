<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Post
{
    public static function all()
    {

        $posts = File::files(resource_path("blogs/"));
        return $posts;
    }
    public static function find($slug)
    {
        $url = resource_path("blogs/my-{$slug}-post.html");
        if (file_exists($url)) {
            $post = cache()->remember("blog/{$slug}", 1200, function () use ($url) {
                return file_get_contents($url);
            });
            return $post;
        } else {
            throw new ModelNotFoundException();
        }
    }
}
