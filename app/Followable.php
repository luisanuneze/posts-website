<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->attach($user);
    }

    public function following(User $user): bool
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        )->withTimestamps();
    }

    public function unfollow(User $user): int
    {
        return $this->follows()->detach($user->id);
    }

    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);
    }
}
