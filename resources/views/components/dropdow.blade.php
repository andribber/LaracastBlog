@props(['slot'])


<div x-data="{show: false}">


    <button @click="show = !show" class="py-2 pl-3 pr-9 text-sm font-semibold">Categories</button>
    <div x-show="show">
        <a href="{{route('home')}}" class="block text-left px-3 hover:bg-gray-300">All</a>
        {{$slot}}
    </div>



</div>
