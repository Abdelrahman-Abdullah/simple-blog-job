<?php

namespace App\Http\Services;

use App\Mail\UserCommentNotification;
use Illuminate\Support\Facades\Mail;


class CommentService
{
    public function store($request, $post)
    {
        $userEmail = $post->user->email;
        if ($userEmail !== auth()->user()->email) {
            $mailContent = [
                'name' => $post->user->name,
                'title' => $post->title,
            ];
            Mail::to($userEmail)->send(new UserCommentNotification($mailContent));
        }
        return $post->comments()->create(array_merge($request->validated(), ['user_id' => auth()->id()]));
    }

    public function destroy($comment)
    {

        return $comment->delete();
    }
}
