@props(['user'])

@php
    $isFollowing = auth()->user()->following($user);
@endphp

@auth
    @unless(auth()->user()->is($user))
        <form method="POST"
              action="{{ $isFollowing ? route('follows.destroy') : route('follows.store')}}">
            @if($isFollowing)
                @method('DELETE')
            @endif

            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <button type="submit"
                    class="bg-indigo-800 rounded-full shadow py-2 px-4 text-white text-xs">
                {{ $isFollowing ? 'Unsubscribe' : 'Subscribe' }}
            </button>
        </form>
    @endunless
@endauth
