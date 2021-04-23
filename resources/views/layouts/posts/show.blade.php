<x-app-layout>
    {{--Article section--}}
    <section id="blog" class="bg-body blog min-h-screen">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 entries">

                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{ asset("assets/img/blog/blog-1.jpg") }}" class="img-fluid" alt="">
                        </div>

                        <h2 class="entry-title">{{ $post->title }}</h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <a href="{{ route('profile.show', ['user' => $post->user->getRouteKey()]) }}">{{ $post->user->name }}</a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <a>{{ $post->created_at->diffForHumans()}}</a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-chat-dots"></i>
                                    <a>{{ $post->comments->count() }} {{ $post->comments->count() == 1 ? 'Comment':'Comments'}}</a>
                                </li>
                                @can('update', $post)
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-pencil"></i>
                                        <a href="{{ route('posts.edit', ['post'=>$post]) }}">Edit</a>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete"
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i>
                                                <span class="span-delete">Delete</span>
                                            </button>
                                        </form>
                                    </li>
                                @endcan
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>{{ $post->body }}</p>
                        </div>

                        <div class="entry-footer">
                            @if($post->tags->isNotEmpty())
                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    @foreach($post->tags as $tag)
                                        <li><a href="{{ route('tags.posts', ['tag' => $tag]) }}">{{ $tag->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </article><!-- End blog entry -->

                    {{--Comments--}}
                    <div class="blog-comments">
                        <a>{{ $post->comments->count() }} {{ $post->comments->count() == 1 ? 'Comment':'Comments'}}</a>

                        {{--Comment form--}}
                        <form id="comment-form" class="rounded-2 mt-2" method="POST"
                              action="{{ route('posts.comments.store', ['post'=>$post]) }}">
                            @csrf

                            <div class="col-md-12 border-indigo-500">
                                <label class="w-3/4">
                                    <textarea class="form-control" name="body" placeholder="Leave a comment"
                                              required></textarea>
                                </label>
                            </div>
                            <div class="col-md-12">
                                <button class="mb-4 bg-indigo-500 rounded-2 p-1 mt-2 text-white flex align-items-end"
                                        type="submit">Post comment
                                </button>
                            </div>
                        </form>

                        <div class="comment-container" id="comments">
                            {{--Parent comment--}}
                            @foreach($post->comments as $comment)
                                <div class="comment">
                                    <div class="d-flex">
                                        <div>
                                            <h5>
                                                <a href="{{ route('profile.show', ['user' => $post->user->getRouteKey()]) }}"></a>{{ $comment->user->name }}
                                                <a href="#" class="reply"><i class="bi bi-reply-fill"></i>Reply</a>
                                            </h5>
                                            <a>{{ $comment->created_at->DiffForHumans() }}</a>
                                            <p>{{ $comment->body }}</p>
                                        </div>
                                    </div>

                                    {{--Replies--}}
                                    @foreach($comment->replies as $reply)
                                        <div id="comment-reply-1" class="comment comment-reply">
                                            <div class="d-flex">
                                                <div>
                                                    <h5>
                                                        <a href="">{{ $reply->user->name }}</a>
                                                    </h5>
                                                    <a>{{ $reply->created_at->DiffForHumans() }}</a>
                                                    <p>{{ $reply->body }}</p>
                                                </div>
                                            </div>
                                            <form id="comment-form" class="rounded-2 mt-2" method="POST"
                                                  action="{{ route('posts.comments.store', ['post'=>$post]) }}">
                                                @csrf

                                                <div class="col-md-12 border-indigo-500">
                                                    <label class="w-3/4">
                                                        <textarea class="form-control" name="body"
                                                                  placeholder="Leave a comment" required></textarea>
                                                    </label>
                                                </div>

                                                <div class="col-md-12">
                                                    <button
                                                        class="mb-4 bg-indigo-500 rounded-2 p-1 mt-2 text-white flex align-items-end"
                                                        type="submit">Post comment
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- End comment reply #1-->

                                        {{--Reply form--}}
                                    @endforeach
                                </div><!-- End comment #2-->
                            @endforeach
                        </div>

                    </div><!-- End blog comments -->
                </div>

                {{--User--}}
                <div class="col-lg-4 h-24 blog-author d-flex align-items-center">
                    <img src="{{asset("assets/img/blog/blog-author.jpg")}}" class="rounded-circle float-left" alt="">
                    <div>
                        <h4>{{ $post->user->name }}</h4>
                        <div class="social-links">
                            <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                            <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                        </div>
                        <p>
                            Description
                        </p>
                    </div>
                </div><!-- End blog author bio -->
            </div>
        </div>
    </section><!-- End Blog Section -->

    <script src="{{ asset('js/main.js') }}" defer></script>
</x-app-layout>
