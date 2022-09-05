<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 class="sr-only">Profile</h1>
        <!-- Welcome panel -->
        <section aria-labelledby="profile-overview-title">
            <div class="rounded-lg bg-white overflow-hidden shadow">

                <div class="bg-white p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                            <div class="flex-shrink-0">
                                <x-user-avatar class="mx-auto h-20 w-20" />
                            </div>
                            <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                <p class="text-sm font-medium text-gray-600">Welcome!</p>
                                <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{Auth::user()->name}}</p>
                                <p class="text-sm font-medium text-gray-600">{{Auth::user()->email}}</p>

                            </div>
                        </div>
                        <div class="mt-5 flex justify-center sm:mt-0">
                            <a href="#"
                                class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                View profile </a>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 bg-gray-50">
                    <div class="bg-white px-4 py-6 shadow sm:px-6">
                        <div>
                            <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
                                <li class="col-span-1 flex shadow-sm rounded-md">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center w-16 bg-pink-600 text-white text-sm font-medium rounded-l-md">
                                        GA</div>
                                    <div
                                        class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                        <div class="flex-1 px-4 py-2 text-sm truncate">
                                            <a href="#" class="text-gray-900 font-medium hover:text-gray-600">Graph
                                                API</a>
                                            <p class="text-gray-500">16 Members</p>
                                        </div>
                                        <div class="flex-shrink-0 pr-2">
                                            <button type="button"
                                                class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span class="sr-only">Open options</span>
                                                <!-- Heroicon name: mini/ellipsis-vertical -->
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </li>

                                <li class="col-span-1 flex shadow-sm rounded-md">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center w-16 bg-purple-600 text-white text-sm font-medium rounded-l-md">
                                        CD</div>
                                    <div
                                        class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                        <div class="flex-1 px-4 py-2 text-sm truncate">
                                            <a href="#" class="text-gray-900 font-medium hover:text-gray-600">Component
                                                Design</a>
                                            <p class="text-gray-500">12 Members</p>
                                        </div>
                                        <div class="flex-shrink-0 pr-2">
                                            <button type="button"
                                                class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span class="sr-only">Open options</span>
                                                <!-- Heroicon name: mini/ellipsis-vertical -->
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </li>

                                <li class="col-span-1 flex shadow-sm rounded-md">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center w-16 bg-yellow-500 text-white text-sm font-medium rounded-l-md">
                                        T</div>
                                    <div
                                        class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                        <div class="flex-1 px-4 py-2 text-sm truncate">
                                            <a href="#"
                                                class="text-gray-900 font-medium hover:text-gray-600">Templates</a>
                                            <p class="text-gray-500">16 Members</p>
                                        </div>
                                        <div class="flex-shrink-0 pr-2">
                                            <button type="button"
                                                class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span class="sr-only">Open options</span>
                                                <!-- Heroicon name: mini/ellipsis-vertical -->
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </li>

                                <li class="col-span-1 flex shadow-sm rounded-md">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center w-16 bg-green-500 text-white text-sm font-medium rounded-l-md">
                                        RC</div>
                                    <div
                                        class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                        <div class="flex-1 px-4 py-2 text-sm truncate">
                                            <a href="#" class="text-gray-900 font-medium hover:text-gray-600">React
                                                Components</a>
                                            <p class="text-gray-500">8 Members</p>
                                        </div>
                                        <div class="flex-shrink-0 pr-2">
                                            <button type="button"
                                                class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span class="sr-only">Open options</span>
                                                <!-- Heroicon name: mini/ellipsis-vertical -->
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                
<!-- >



            </div>
        </section>


    </div>
</x-app-layout>