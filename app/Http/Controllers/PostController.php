<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:update,post')->only('edit');
    }

    public function index()
    {
        return view('layouts.posts.index', [
            'posts' => auth()->user()->timeline()
        ]);
    }

    public function create()
    {
        $tags = Tag::all();

        return view('layouts.posts.create', compact('tags'));
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        /** @var User $user */
        $user = Auth::user();

        /** @var Post $post */
        $post = $user->posts()->create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'cover' => 'cover',
        ]);

        $post->tags()->sync($validated['tags']);

        return redirect()->action([static::class, 'index']);
    }

    public function show(Post $post, Comment $comment)
    {
        $post->load(['tags', 'user', 'comments.user', 'comments.replies.user']);

        return view('layouts.posts.show', compact('post', 'comment'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('layouts.posts.edit', compact('post', 'tags'));
    }

    public function update(Post $post, UpdatePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $tags = Tag::all();

        $post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'cover' => 'cover',
        ]);

        $post->tags()->sync(request('tags'));

        return redirect()->action([static::class, 'show'], ['post' => $post]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        abort_unless(Auth::id() == $post->user_id, Response::HTTP_UNAUTHORIZED);

        $post->delete();

        return redirect()->action([static::class, 'index']);
    }
}
