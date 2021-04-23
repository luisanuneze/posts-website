<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentPostController extends Controller
{
    public function store(Post $post, StoreCommentRequest $request): Model
    {
        $validated = $request->validated();
        /** @var User $user */
        $user = Auth::user();

        $comment = $post->comments()->create([
            'user_id' => $user->id,
            'body' => $validated['body'],
        ]);

        $comment->load('user');

        return $comment;
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
