<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagPostController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->with('tags')->latest()->paginate(10);

        return view('layouts.posts.tag', compact('posts'));
    }
}
