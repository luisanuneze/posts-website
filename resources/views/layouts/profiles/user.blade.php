<x-app-layout>
    {{--Article section--}}
    <section id="blog" class="bg-body blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 entries">
                    <header class="mb-6">
                        <div class="relative">
                            <img src="{{ $user->cover }}"
                                 class="mb-2 h-64 w-100 bg-cover object-cover bg-no-repeat bg-center"
                                 alt="">

                            <img src="{{ $user->avatar }}"
                                 alt=""
                                 class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                                 style="left: 50%"
                                 width="150px">
                        </div>

                        <div class="flex justify-between items-center my-8">
                            <div style="max-width: 270px">
                                <h2 class="text-indigo-800 font-bold text-2xl mb-0">{{ $user->name }}</h2>
                                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
                            </div>

                            <div class="flex">
                                @if(current_user()->is($user))
                                    <a href="{{ route('profile.edit', ['user'=>$user]) }}"
                                       class="bg-indigo-800 rounded-2 shadow py-2 px-4 text-white mr-4">
                                        Edit Profile
                                    </a>
                                @endif

                                <x-follow-button :user="$user"></x-follow-button>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm">{{ $user->biography }}</p>
                        </div>
                    </header>
                    @each('layouts.partials.post', $posts, 'post')
                    {{ $posts->links() }}
                </div>
                @include('layouts.partials.sidebar')
            </div>
        </div>
    </section><!-- End Blog Section -->
</x-app-layout>

