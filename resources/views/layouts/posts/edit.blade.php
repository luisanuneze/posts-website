<x-app-layout>
    <body class="bg-body min-h-screen">
    <div class="col-lg-6 m-auto">
        <form class="border-1 p-8 rounded-2 mt-16" method="POST" action="/posts/{{$post->id}}">
            @csrf
            @method("PUT")
            <div class="row gy-4 border-indigo-500">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $post->title }}"
                           required>
                </div>

                <div class="col-md-12 border-indigo-500">
                    <textarea class="form-control" name="body" rows="6" placeholder="Body"
                              required>{{ $post->body }}</textarea>
                </div>

                <div>
                    <label class="label" for="body">Tags</label>

                    <div class="px-1 w-64 mt-4 rounded-sm max-w-screen origin-center right-0 appear-done enter-done">
                        <label class="w-3/4">
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
                    <button class="bg-indigo-500 rounded-2 p-2 text-white" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
    </body>

</x-app-layout>
