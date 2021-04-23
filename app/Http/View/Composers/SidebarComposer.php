<?php

namespace App\Http\View\Composers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $recentPosts = Post::latest()->take(5)->get();

        $tags = Tag::all();

//        $userSubs = auth()->user()->follows()->folowing_user_id;

        $view->with(['tags' => $tags, 'recentPosts' => $recentPosts]);
    }
}
