<div
    class="flex-shrink-0 flex items-center justify-center w-16 {{$color?:'bg-pink-600'}} text-white text-sm font-medium rounded-l-md">
    {{$initial}}
</div>
<div
    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
    <div class="flex-1 px-4 py-2 text-sm truncate">
        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">
            {{$name ?:'Dashboard Component'}}
        </a>
        <p class="text-gray-500">{{$description?:'Description'}}</p>
    </div>
    <div Sclass="flex-shrink-0 pr-2">
        <a href="{{route($route?:'dashboard')}}"
            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            <span class="sr-only">Open options</span>
            <svg class="w-5 h-5" x-description="Heroicon name: solid/dots-vertical" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                </path>
            </svg>
        </a>


    </div>
</div>