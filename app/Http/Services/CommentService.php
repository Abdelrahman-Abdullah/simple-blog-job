<?php

namespace App\Http\Services;

class CommentService
{
    public function store($request, $post)
    {
        return $post->comments()->create(array_merge($request->validated(), ['user_id' => auth()->id()]));
    }

    public function destroy($comment)
    {
        return $comment->delete();
    }
}
