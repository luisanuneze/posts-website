<x-app-layout>

    <div class="col-lg-6 m-auto min-h-screen">
        <form class="border-1 p-8 rounded-2 mt-16" method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div class="row gy-4 border-indigo-500">
                <div class="col-md-12">
                    <input type="text" class="form-control w-3/4" name="title" placeholder="Title" required>

                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12 border-indigo-500">
                    <label class="w-3/4">
                        <textarea class="form-control" name="body" rows="6" placeholder="Body" required></textarea>
                    </label>
                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

{{--                <div class="mb-6">--}}
{{--                    <label class="block mb-2 font-bold text-xs text-gray-700"--}}
{{--                           for="cover"--}}
{{--                    >--}}
{{--                        Post cover--}}
{{--                    </label>--}}

{{--                    <div class="flex">--}}
{{--                        <input class="border border-gray-400 p-2 w-full"--}}
{{--                               type="file"--}}
{{--                               name="cover"--}}
{{--                               id="cover"--}}
{{--                               accept="image/*"--}}
{{--                        >--}}

{{--                        <img src="{{ $post->cover }}"--}}
{{--                             alt="Your cover"--}}
{{--                             width="40"--}}
{{--                        >--}}
{{--                    </div>--}}

{{--                    @error('cover')--}}
{{--                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}

                <div>
                    <label class="label" for="body">Tags</label>

                    <div class="px-1 w-64 mt-4 rounded-sm max-w-screen origin-center right-0 appear-done enter-done">
                        <label>
                            <select name="tags[]" multiple>
                                @foreach($tags as $tag)
                                    <option
                                        class="flex items-center px-3 py-3 cursor-pointer hover:bg-gray-200 font-light text-sm focus:outline-none"
                                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        @error('tags')
                        <p class="cursor-help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="bg-indigo-500 rounded-2 p-2 text-white" type="submit">Create</button>
                </div>
            </div>

        </form>
    </div>

</x-app-layout>
