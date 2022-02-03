@props(['comment'])


<article class="flex bg-gray-200 p-6 rounded-xl border border-gray-300 space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{$comment->user_id}}" alt="" width="60" height="60" class="rounded-full">
    </div>
    <div>
        <header class="mb-4">
            <strong>{{$comment->author->name}}</strong>
            <p class="text-xs">Posted
                <time>{{$comment->created_at->diffForHumans()}}</time></p>
        </header>
        <p>{{$comment->body}}</p>
    </div>
</article>
