
<x-layout>
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">

                        <div class="ml-3 text-left">
                            <a href="/?author={{$post->author->username}}"><h5 class="font-bold">{{$post->author->name}}</h5></a>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/home"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category='$post->category'></x-category-button>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <p>{{$post->body}}</p>
                    </div>
                </div>

                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    @auth
                    <form method="POST" action="/post/{{$post->slug}}/comment" class="p-6 rounded-xl border border-gray-300">
                        @csrf

                        <header class="flex items-center">
                            <img src="https://i.pravatar.cc/100?u={{auth()->id()}}" alt="" width="60" height="60" class="rounded-full">
                            <h1 class="ml-4">Want to participate?</h1>
                        </header>
                        <div class="mt-6">
                            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" cols="10" rows="2" placeholder="Write your comment here!" required></textarea>
                        @error('body')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="flex justify-end mt-6">
                            <button class="bg-blue-500 text-white font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-700" type="submit">Post</button>
                        </div>
                    </form>

                    @endauth


                    @foreach ($post->comment as $comments)
                        <x-post-comment :comment=$comments></x-post-comment>
                    @endforeach
                </section>


            </article>
        </main>
    </section>
</body>


</x-layout>


