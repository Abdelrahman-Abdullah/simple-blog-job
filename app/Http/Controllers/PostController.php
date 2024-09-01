<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected PostService $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->all();
        if (!\request()->wantsJson()) {
            return view('post.index', compact('posts'));
        }

        return response()->json([
            'message' => 'Post created successfully',
            'data' => PostResource::collection($posts)
        ],201);
    }

    public function create(): Factory|View|Application
    {
        return view('post.create');
    }
    public function store(PostStoreRequest $request)
    {
        $posts = $this->postService->storePost($request);
        if (!$request->wantsJson()) {
            return redirect()->route('dashboard');
        }
        return response()->json([
            'message' => 'Post created successfully',
            'data' => new PostResource($posts)
        ],201);

    }

    public function show($id)
    {
        $post = $this->postService->find($id);
        if (!\request()->wantsJson()) {
            return view('post.show', compact('post'));
        }

        return response()->json([
            'message' => 'Post created successfully',
            'data' => new PostResource($post)
        ],201);
    }

    public function edit($id)
    {
        $post = $this->postService->find($id);
        return view('post.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        if (auth()->id() != $post->user_id) {
            return response()->json([
                'message' => 'You are not authorized to update this post',
            ], 403);
        }
         $this->postService->update($request, $post);
        if (!$request->wantsJson()) {
            return redirect()->route('post.show', $post);
        }
        return response()->json([
            'message' => 'Post Updated successfully',
        ]);
    }

    public function destroy(Post $post)
    {
        if (auth()->id() != $post->user_id) {
            return response()->json([
                'message' => 'You are not authorized to delete this post',
            ], 403);
        }

        $this->postService->delete($post);
        if (!\request()->wantsJson()) {
            return redirect()->route('dashboard');
        }

        return response()->json([
            'message' => 'Post deleted successfully',
        ]);
    }
}
