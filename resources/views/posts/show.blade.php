<x-layouts.app>
    <section class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
        @can('update', $post)
            <flux:button variant="primary" color="yellow" href="{{ route('posts.edit', ['post' => $post->uuid]) }}">Edit
            </flux:button>
        @endcan

        @can('delete', $post)
            <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                @method('DELETE')
                @csrf

                <flux:button variant="primary" color="red" type="submit">Delete</flux:button>
            </form>
        @endcan

        <div class="mx-auto max-w-2xl lg:max-w-4xl text-center">
            <h1>{{ $post->title }}</h1>

            <figure class="mt-10">
                <blockquote class="text-center text-xl/8 font-semibold text-white sm:text-2xl/9">
                    <p>{{ $post->content }}</p>
                </blockquote>
                <figcaption class="mt-10">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="" class="mx-auto size-10 rounded-full" />
                    <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                        <div class="font-semibold text-white">{{ $post->user->name }}</div>
                        <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-white">
                            <circle r="1" cx="1" cy="1" />
                        </svg>
                        <div class="text-gray-400">{{ $post->user->email }}</div>
                    </div>
                </figcaption>
            </figure>
        </div>

        <form action="{{ route('comments.store', ['post' => $post]) }}" method="POST">
            @csrf

            <flux:input name="message" type="text" placeholder="Add your comment" required />
            <flux:button variant="primary" color="blue" type="submit">Add Comment</flux:button>
        </form>

        <ul role="list" class="divide-y divide-white/5">
            @foreach ($post->comments as $comment)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="size-12 flex-none rounded-full bg-gray-800 outline -outline-offset-1 outline-white/10" />
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-white">{{ $comment->message }}</p>
                            <p class="mt-1 truncate text-xs/5 text-gray-400">{{ $comment->user->name }}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        @can('delete', $comment)
                            <form action="{{ route('comments.destroy', ['comment' => $comment]) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <flux:button variant="primary" color="red" type="submit">Delete</flux:button>
                            </form>
                        @endcan

                        <p class="mt-1 text-xs/5 text-gray-400">{{ $comment->updated_at->diffForHumans() }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</x-layouts.app>
