<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class PostLikeController extends Controller
{
    public function store(Post $post): RedirectResponse
    {
        $post->like(current_user());

        return back();
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->dislike(current_user());

        return back();
    }
}
