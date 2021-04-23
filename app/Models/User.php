<?php

namespace App\Models;

use App\Followable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getAvatarAttribute($value): string
    {
        if (!$value) {
            return asset('/assets/default-avatar.jpg');
        }

        return Storage::disk('public')->url($value);
    }

    public function getCoverAttribute($value): string
    {
        if (!$value) {
            return asset('/assets/cover.jpg');
        }

        return Storage::disk('public')->url($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function timeline(): LengthAwarePaginator
    {
        $myId = Auth::id();
        $following = $this->follows()->pluck('users.id');
        $following->push($myId);

        return Post::whereIn('user_id', $following)
            ->with(['user', 'tags'])
            ->withCount('comments')
            ->withCount(
                [
                    'likes' => function (Builder $builder) {
                        $builder->where('liked', true);
                    },
                    'likes as dislikes_count' => function (Builder $builder) {
                        $builder->where('liked', false);
                    },
                ]
            )
            ->latest()
            ->paginate(10);
    }
}
