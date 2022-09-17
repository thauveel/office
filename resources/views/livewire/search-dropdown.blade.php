<div class="w-full relative" x-data="{ isOpen: false }" @click.away="isOpen = false">
    @if ($selected)
    <input  type="hidden" name="{{$name}}" value="{{$selected[$selectfield]}}">
    <div class="rounded-md hover:bg-gray-200  hover:text-gray-700 px-3 py-3 transition ease-in-out duration-150">
        <p class="ml-4 thaana-p text-gray-600 text-sm flex justify-between">
        <span>{{ $selected[$headerfield] }} </span>
        <span class="cursor-pointer text-red-500" wire:click="clearselected()">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
        </span>
        </p>
        <div class="mb-2">
            @foreach ($displayfields as $field)
                @if(is_array($field))
                    <p class="ml-4 thaana flex justify-between">
                        @foreach ($field as $subfield)
                            <span>{{$selected[$subfield]}}</span>
                        @endforeach
                    </p>
                @else
                <p class="ml-4 thaana">{{$selected[$field]}}</p>
                @endif
            @endforeach
        </div>
    </div>
    @else
    <button 
        class="inline-flex justify-between w-full mt-1 px-2 py-2 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-blue-200 focus:border-blue-300 focus:ring-opacity-50 active:bg-gray-50 active:text-gray-800"
        type="button" @click="isOpen = ! isOpen">

        <span>{{$placeholder}}</span>
        <svg class="w-5 h-5 ml-2 mt-0.5 flex-none justify-items-end" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    @endif

    <div 
        class="z-50 absolute bg-white border border-gray-300 text-sm rounded-lg shadow-lg w-full max-h-64 overflow-y-auto" 
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-75" 
        x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
        style="display: none;"
        x-show="isOpen">
        <input
            class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm thaana-p block w-full thaana-p block w-full"
            wire:model.debounce.500ms="search" type="text" placeholder="Search">


        @if (strlen($search) >= 2)
        @if ($searchResults->count() > 0)
        <ul>
            @foreach ($searchResults as $result)
            <li class="border-b border-gray-100">
                <div wire:click="selected({{$result}})" 
                    @click="isOpen = false"
                    class="hover:bg-blue-700  hover:text-white px-3 py-3 transition ease-in-out duration-150"
                    @if ($loop->last) @keydown.tab="isOpen = false" @endif
                    >

                    <p class="ml-4 thaana-p text-gray-600 text-sm">{{ $result[$headerfield] }} </p>
                    <div class="mb-2">
                        @foreach ($displayfields as $field)
                            @if(is_array($field))
                                <p class="ml-4 thaana flex justify-between">
                                    @foreach ($field as $subfield)
                                        <span>{{$result[$subfield]}}</span>
                                    @endforeach
                                </p>
                            @else
                            <p class="ml-4 thaana">{{$result[$field]}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
        @else
        <ul>
            <li class="border-b border-gray-100">
                <div
                    class="block  hover:bg-blue-700  hover:text-white px-3 py-3 flex items-center transition ease-in-out duration-150">

                    <span class="ml-4 thaana-p">No results for "{{ $search }}"</span>
                </div>
            </li>
        </ul>
        @endif
        @endif

    </div>

</div>