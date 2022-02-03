<x-layout>

    <section class="px-6 py-6">

        <h1>Create a New Post</h1>

        <div class="max-w-sm mx-auto bg-gray-300 p-3 rounded-xl">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{old('title')}}" required>

                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" value="{{old('slug')}}" required>

                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt" value="{{old('excerpt')}}"required></textarea>

                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" value="{{old('body')}}" for="body">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" id="body" required></textarea>

                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Category
                    </label>
                    <select name="category_id" id="category_id">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-gray-700">
                        Publish
                    </button>
                </div>
            </form>
        </div>
    </section>


</x-layout>
