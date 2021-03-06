<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>


<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">

            <div class="mt-8 md:mt-0">

                <a href="{{route('home')}}" class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Home Page</a>

                @cannot('admin')
                <a href="#newsletter" class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
                @endcannot

                @can('admin')
                <a href="/admin/posts/create" class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Create a new post
                </a>
                <a href="/admin/posts" class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Edit a post
                </a>
                <a href="/admin/users" class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Edit a user
                </a>
                @endcan
            </div>

            <div class="mt-8 md:mt-0 flex">

                @auth

                <span class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name}}!</span>

               <form method="POST" action="/logout">
               @csrf
               <button class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Logout</button>
               </form>

               @else
                   <a href="/register" class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Create Account</a>
                   <a href="/login" class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Login</a>
               @endauth


            </div>
        </nav>

        {{$slot}}


        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                   @error('email')
                                       <span class="text-xs text-red-500"> {{$message}}</span>
                                   @enderror
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    @if (session()->has('success'))

    <div x-data="{show: true}" x-int="setTimeout(()=> show = false, 4000)" x-show="show" class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{session('success')}}</p>
    </div>

    @endif
</body>
