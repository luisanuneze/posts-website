<div class="col-lg-4">

    <div class="sidebar">
        <h3 class="sidebar-title">Search</h3>

        <div class="sidebar-item search-form">
            <form action="{{ route('posts.index') }}" method="GET" role="search">
                @csrf

                <label>
                    <input type="text" id="term" name="term">
                </label>

                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End sidebar search form-->

        <div class="mb-2">
            <a href="{{ route('subscriptions.index') }}"><h3 class="sidebar-title">Subscriptions</h3></a>
            <ul>
                @foreach(auth()->user()->follows->take(5) as $user)
                    <li class="mb-4">
                        <div class="flex items-center">
                            <h4>
                                <a href="{{ route('profile.show', ['user' => $user->getRouteKey()]) }}"
                                   class="text-indigo-800">{{ $user->name }}</a>
                            </h4>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <h3 class="sidebar-title">Recent Posts</h3>

        <div class="sidebar-item recent-posts">
            @foreach($recentPosts as $post)
                <div class="post-item clearfix">
                    <img
                        src="https://images.unsplash.com/photo-1614314442865-ce2fb2ade429?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1951&q=80"
                        alt="">

                    <h4><a href="{{route('posts.show', ['post'=>$post])}}">{{ $post->title }}</a></h4>

                    <div class="d-flex">
                        <i class="bi bi-clock ml-4"></i>

                        <p class="mt-0.5 ml-1">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        </div><!-- End sidebar recent posts-->

        @if($tags->isNotEmpty())
            <h3 class="sidebar-title">Tags</h3>

            <div class="sidebar-item tags mb-4">
                <ul>
                    @foreach($tags as $tag)
                        <li>
                            <a href="{{ route('tags.posts', ['tag' => $tag]) }}">{{ $tag->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div><!-- End sidebar tags-->
        @endif

        <a href="{{route('explore.index')}}" class="sidebar-title">Explore</a>
    </div><!-- End sidebar -->
</div>
