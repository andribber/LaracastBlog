<x-dropdow>
    @foreach ($categories as $category)
    {{--<a href="/?category={{$category->slug}}&{{http_build_query(request()->except('category'))}}"class="block text-left px-3 hover:bg-gray-300">{{$category->name}}</a>--}}
    <a href="{{ route('home', ['category' => $category->slug ?? '']) }}"class="block text-left px-3 hover:bg-gray-300">{{$category->name}}</a>
    @endforeach
</x-dropdow>
