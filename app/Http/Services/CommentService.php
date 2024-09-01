<?php

namespace App\Http\Services;

class CommentService
{
    public function storeComment($request, $post)
    {
        return $post->comments()->create(array_merge($request->validated(), ['user_id' => auth()->id()]));

    }
}
