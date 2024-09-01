<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Services\CommentService;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function create(Post $post)
    {
        return view('comment.create', compact('post'));
    }

    public function store(CommentStoreRequest $request, Post $post)
    {
        $comment = $this->commentService->store($request, $post);
        if (!$request->wantsJson()) {
            return redirect()->route('post.show', $comment->post_id);
        }
    }

    public function delete(Comment $comment)
    {
        $this->commentService->destroy($comment);
        if (!request()->wantsJson()) {
            return redirect()->back();
        }
    }
}
