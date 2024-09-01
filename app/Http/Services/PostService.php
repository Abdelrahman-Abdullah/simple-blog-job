<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function all(): Collection
    {
        return Post::all();
    }
    public function storePost($request)
    {
        return Post::create(array_merge($request->validated(), ['user_id' => auth()->id()] ));
    }
}
