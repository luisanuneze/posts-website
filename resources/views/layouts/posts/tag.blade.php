<x-app-layout>
    {{--Article section--}}
    <section id="blog" class="blog">
        <div class="container">
            <div class="col-lg-8 entries">
                @foreach($posts as $post)
                    @include('layouts.partials.post')
                @endforeach

                {{$posts->links()}}

            </div>
        </div>
    </section><!-- End Blog Section -->
</x-app-layout>
