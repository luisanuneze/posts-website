<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with(['tags', 'user'])->latest()->paginate(10);

        return view('layouts.profiles.user', compact('posts', 'user'));
    }

    public function show(User $user)
    {
        return view('layouts.profiles.user', compact('user'));
    }
}
