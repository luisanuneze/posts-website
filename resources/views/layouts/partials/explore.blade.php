<x-app-layout>
    <section id="blog" class="bg-body blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 entries">
                    <h3 class="font-bold text-indigo-900 mb-4">Explore</h3>
                    <div>
                        @foreach($users as $user)
                            <div class="flex items-center mb-2">
                                <img src="{{ $user->avatar }}"
                                     width="10%" class="mr-4 rounded-circle">
                                <div>
                                    <h4 class="font-bold"> {{ $user->name }} </h4>
                                </div>
                            </div>
                        @endforeach
                            {{ $users->links() }}
                    </div>
                    @include('layouts.partials.newsletter')
                </div>
                @include('layouts.partials.sidebar')
            </div>
        </div>
    </section>
</x-app-layout>
