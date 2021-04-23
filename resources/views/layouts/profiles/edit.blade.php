<x-app-layout>
    <div class="mt-4">
        <div class="col-lg-6 m-auto">
            <form method="POST"
                  action="{{ action([\App\Http\Controllers\ProfileController::class, 'update'], [$user]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="name"
                    >
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ $user->name }}"
                           required
                    >

                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-bold text-xs text-gray-700"
                           for="avatar"
                    >
                        Avatar
                    </label>

                    <div class="flex">
                        <input class="border border-gray-400 p-2 w-full"
                               type="file"
                               name="avatar"
                               id="avatar"
                               accept="image/*"
                        >

                        <img src="{{ $user->avatar }}"
                             alt="your avatar"
                             width="40"
                        >
                    </div>

                    @error('avatar')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-bold text-xs text-gray-700"
                           for="cover"
                    >
                        Cover
                    </label>

                    <div class="flex">
                        <input class="border border-gray-400 p-2 w-full"
                               type="file"
                               name="cover"
                               id="cover"
                               accept="image/*"
                        >

                        <img src="{{ $user->cover }}"
                             alt="Your cover"
                             width="40"
                        >
                    </div>

                    @error('cover')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="biography"
                    >
                        Biography
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="biography"
                           id="biography"
                           value="{{ $user->biography }}"
                           required
                    >

                    @error('biography')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ $user->email }}"
                           required
                    >

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{--                <div class="mb-6">--}}
                {{--                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"--}}
                {{--                           for="password"--}}
                {{--                    >--}}
                {{--                        Password--}}
                {{--                    </label>--}}

                {{--                    <input class="border border-gray-400 p-2 w-full"--}}
                {{--                           type="password"--}}
                {{--                           name="password"--}}
                {{--                           id="password"--}}
                {{--                           required--}}
                {{--                    >--}}

                {{--                    @error('password')--}}
                {{--                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}

                {{--                <div class="mb-6">--}}
                {{--                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"--}}
                {{--                           for="password_confirmation"--}}
                {{--                    >--}}
                {{--                        Password Confirmation--}}
                {{--                    </label>--}}

                {{--                    <input class="border border-gray-400 p-2 w-full"--}}
                {{--                           type="password"--}}
                {{--                           name="password_confirmation"--}}
                {{--                           id="password_confirmation"--}}
                {{--                           required--}}
                {{--                    >--}}

                {{--                    @error('password_confirmation')--}}
                {{--                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}

                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
                    >
                        Submit
                    </button>

                    <a href="{{ route('profile.show', ['user' => $user]) }}" class="hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
