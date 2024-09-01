<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Post $post)
    {
        return view('comment.create', compact('post'));
    }
}
