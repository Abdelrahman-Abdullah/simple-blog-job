<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function all(): Collection
    {
        return Post::orderBy('created_at', 'desc')->get();
    }
    public function storePost($request)
    {
        return Post::create(array_merge($request->validated(), ['user_id' => auth()->id()] ));
    }

    public function find($id): Post
    {
        return Post::with('comments')->find($id);
    }
    public function update($request, $post)
    {
       return $post->update($request->validated());
    }

    public function delete($post)
    {
        return $post->delete();
    }

}
