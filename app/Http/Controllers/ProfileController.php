<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->with(['user'])->withCount([
            'likes' => function (Builder $builder) {
                $builder->where('liked', true);
            },
            'likes as dislikes_count' => function (Builder $builder) {
                $builder->where('liked', false);
            },
        ])->latest()->paginate(10);

        return view('layouts.profiles.user', compact('posts', 'user'));
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        return view('layouts.profiles.edit', compact('user'));
    }

    public function update(User $user): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['image'],
            'cover' => ['image'],
            'biography' => 'string',
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars', 'public');
        }

        if (request('cover')) {
            $attributes['cover'] = request('cover')->store('avatars', 'public');
        }

        $user->update($attributes);

        return redirect()->action([static::class, 'show'], ['user' => $user]);
    }
}
