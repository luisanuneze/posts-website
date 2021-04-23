<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        auth()->user()->follow($user);

        return back();
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        auth()->user()->unfollow($user);

        return back();
    }
}
