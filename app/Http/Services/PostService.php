<?php

namespace App\Http\Services;

use App\Models\Post;
class PostService
{
    public function storePost($request)
    {
        return Post::create(array_merge($request->validated(), ['user_id' => auth()->id()] ));
    }
}
