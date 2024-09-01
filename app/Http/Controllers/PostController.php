<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Services\PostService;
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

    }

    public function show($id)
    {
        $post = $this->postService->find($id);
        if (!\request()->wantsJson()) {
            return view('post.show', compact('post'));
        }
    }

    public function edit($id)
    {
        $post = $this->postService->find($id);
        if (!\request()->wantsJson()) {
            return view('post.edit', compact('post'));
        }
    }

    public function update(PostStoreRequest $request, $id)
    {
         $this->postService->update($request, $id);
        if (!$request->wantsJson()) {
            return redirect()->route('post.show', $id);
        }
    }
}
