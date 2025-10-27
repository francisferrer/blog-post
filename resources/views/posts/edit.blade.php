<x-layouts.app :title="__('Edit Post')">
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">Edit post</h2>
    </div>
    <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="title" class="block text-sm/6 font-semibold text-white">Title</label>
                <div class="mt-2.5">
                    <input id="title" type="text" name="title" value="{{ $post->title }}"
                        class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
                </div>

                @error('title')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="content" class="block text-sm/6 font-semibold text-white">Content</label>
                <div class="mt-2.5">
                    <textarea id="content" name="content" rows="4"
                        class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500">{{ $post->content }}</textarea>
                </div>

                @error('content')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-10">
            <button type="submit"
                class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Edit
                post</button>
        </div>
    </form>
</x-layouts.app>
