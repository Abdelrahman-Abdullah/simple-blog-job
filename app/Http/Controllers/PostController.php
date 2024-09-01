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
}
