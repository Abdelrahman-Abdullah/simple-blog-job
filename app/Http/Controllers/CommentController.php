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

        return response()->json([
            'message' => 'Comment created successfully',
        ], 201);
    }

    public function delete(Comment $comment)
    {
        if (auth()->id() != $comment->user_id) {
            return response()->json([
                'message' => 'You are not authorized to delete this comment',
            ], 403);
        }

        $this->commentService->destroy($comment);
        if (!request()->wantsJson()) {
            return redirect()->back();
        }
        return response()->json([
            'message' => 'Comment deleted successfully',
        ], 200);
    }
}
