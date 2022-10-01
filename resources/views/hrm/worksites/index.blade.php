<x-hrm-layout>
    <x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Work Sites
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

                <a href="{{route('hrm.worksites.create')}}"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                    Add Work Site
                </a>
            </div>
        </div>
    </x-slot>


    <div class="px-4 sm:px-6 lg:px-8">
        <div class="-mx-4 mt-8 overflow-hidden  sm:-mx-6 md:mx-0 md:rounded-lg">
            <div class="m-1 grid grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach ($worksites as $worksite)
                <div
                    class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-gray-500 focus-within:ring-offset-2 hover:border-gray-400">
                    <div class="flex justify-center items-center   h-10 w-10 rounded-full bg-gray-900">

                        <svg class="flex-1 h-6 w-6 text-gray-300" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <path d="M12 7a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <a href="#" class="focus:outline-none">
                            <p class="text-sm font-medium text-gray-900">{{$worksite->name}}<span
                                    class="inline-block flex-shrink-0 rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800">{{$worksite->code}}</span>
                            </p>
                            <p class="truncate text-sm text-gray-500">Head:
                                {{$worksite->head ? $worksite->head->name : 'Not Assigned'}}</p>
                        </a>
                    </div>

                    <div sclass="flex-shrink-0 pr-2">
                        <a href="{{route('hrm.worksites.edit', compact('worksite')) }}"
                            class="w-8 h-8 bg-white inline-flex items-center justify-center">
                            <x-tooltip>
                                <x-slot name="trigger">
                                    <svg class="w-5 h-5 text-gray-900 hover:text-indigo-600" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </x-slot>
                                Edit
                            </x-tooltip>



                        </a>
                        
                        @can('read shift')
                        <a href="{{route('hrm.worksites.shifts.index', compact('worksite')) }}"
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 ">
                            <x-tooltip>
                                <x-slot name="trigger">
                                    <svg class="w-5 h-5 text-gray-900 hover:text-green-600" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                        <path d="M16 2v4"></path>
                                        <path d="M8 2v4"></path>
                                        <path d="M3 10h18"></path>
                                    </svg>
                                </x-slot>
                                Shifts
                            </x-tooltip>
                        </a>
                        @endcan
                        
                    </div>
                    

                </div>
                
                @endforeach
            </div>
        </div>

        <div class="flex flex-col justify-between my-5">
            {{$worksites->links()}}
        </div>
    </div>
</x-hrm-layout>