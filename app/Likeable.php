<?php

namespace App;

use App\Models\User;

trait Likeable
{
    public function isLikedBy(User $user): bool
    {
        return $this->likes()
            ->where('user_id', $user->id)
            ->where('liked', true)
            ->exists();
    }

    public function isDislikedBy(User $user): bool
    {
        return $this->likes()
            ->where('user_id', $user->id)
            ->where('liked', false)
            ->exists();
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]
        );
    }
}
