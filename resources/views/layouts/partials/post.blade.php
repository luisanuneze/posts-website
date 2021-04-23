<article class="entry">

    <h2 class="entry-title">
        <a href="{{ route('posts.show', ['post'=> $post]) }}"> {{$post->title}}</a>
    </h2>

    <div class="entry-meta">
        <ul>
            <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                <a href="{{ route('profile.show', ['user' => $post->user->getRouteKey()]) }}">{{ $post->user->name }}</a>
            </li>

            <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                <a>{{ $post->created_at->diffForHumans()}}</a>
            </li>

            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                <a>{{ $post->comments_count }} {{Str::plural('Comment', $post->comments_count)}}</a>
            </li>
        </ul>
    </div>

    <div class="entry-content">
        <p>{{ Str::limit($post->body, 300) }}</p>

        <div class="flex justify-content-between mt-4">
            {{--                    Vote up--}}
            <div class="flex justify-content-between">
                <form method="POST" action="{{ route('likes.store', ['post'=>$post]) }}">
                    @csrf
                    <div
                        class="flex items-center {{ $post->isLikedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up"
                             cursor="pointer"
                             class="svg-inline--fa fa-chevron-up fa-w-14 w-4 h-4" role="img"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 448 512">
                            <path fill="currentColor"
                                  d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path>
                        </svg>
                        <button type="submit" class="ml-2 text-xs text-gray-500">{{ $post->likes_count?: 0 }}</button>
                    </div>
                </form>

                {{--                Vote down--}}
                <form method="POST" action="{{ route('likes.store', ['post'=>$post]) }}">
                    @csrf
                    @method('DELETE')
                    <div
                        class="flex items-center mx-2 {{ $post->isDislikedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down"
                             cursor="pointer"
                             class="svg-inline--fa fa-chevron-down fa-w-14 w-4 h-4" role="img" fill="none"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                  d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                        </svg>
                        <button type="submit"
                                class="ml-2 text-xs text-gray-500">{{ $post->dislikes_count?: 0 }}</button>
                    </div>
            </div>
            </form>

            <div class="read-more">
                <a href="{{ route('posts.show', ['post'=> $post]) }}">Read More</a>
            </div>
        </div>
    </div>
</article><!-- End blog entry -->
