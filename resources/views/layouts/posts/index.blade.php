<x-app-layout>
    {{--Article section--}}
    <section id="blog" class="bg-body blog">
        <div class="container">
            <div class="row my-2 ml-0.5">
                <a href="{{route('posts.create')}}"
                   class="w-16 md:w-32 lg:w-48 my-4 bg-indigo-800 rounded-2 p-2 text-white text-center">
                    New post
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8 entries">
                    @each('layouts.partials.post', $posts, 'post')

{{--                    @forelse($posts as $post)--}}
{{--                        @include('layouts.partials.post')--}}
{{--                    @empty--}}
{{--                        <p>No posts</p>--}}
{{--                    @endforelse--}}
                    @include('layouts.partials.newsletter')

                    {{$posts->links()}}
                </div>
                @include('layouts.partials.sidebar')
            </div>

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center active">
                <i class="bi bi-arrow-up-short"></i>
            </a>
        </div>
    </section><!-- End Blog Section -->
</x-app-layout>
