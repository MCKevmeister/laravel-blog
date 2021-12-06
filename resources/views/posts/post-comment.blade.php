@props(['comment'])

<x-panel class="bg-gray-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" width="60" height="60" class="rounded-xl">
        </div>

        <div>
            <header>
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">
                    Posted <time>{{ $comment->format('F j, Y, g:i a') }}</time> {{-- $comment->created_at->diffForHumans() --}}
                </p>
            </header>

            <p>
                { $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
