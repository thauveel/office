<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="antialiased font-sans bg-gray-50" data-new-gr-c-s-check-loaded="14.1056.0" data-gr-ext-installed="">

    <div class="bg-gray-100 overflow-y-auto">
        <div x-data="{ open: false }" @keydown.window.escape="open = false" class="min-h-full">

            <x-hrm.mobile-nav/>


            <!-- Static sidebar for desktop -->
            <x-hrm.nav/>

            <div class="lg:pl-64 flex flex-col flex-1">
                <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200">
                    <button type="button"
                        class="px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500 lg:hidden"
                        @click="open = true">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-1"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16"></path>
                        </svg>
                    </button>
                    <!-- Search bar -->
                    <div class="flex-1 px-4 flex justify-between sm:px-6 lg:mx-auto lg:px-8">
                        <div class="flex-1 flex">
                            <form class="w-full flex md:ml-0" action="#" method="GET">
                                    <label for="search-field" class="sr-only">Search</label>
                                    <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                                            aria-hidden="true">
                                            <svg class="h-5 w-5" x-description="Heroicon name: solid/search"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input id="search-field" name="filter[query]" value="{{old('filter.query')}}"
                                            class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent sm:text-sm"
                                            placeholder="Search" type="search">
                                    </div>
                                </form>
                        </div>
                        <div class="ml-4 flex items-center md:ml-6">
                            <x-dropdown align="right" width="80">
                                <x-slot name="trigger">
                                    <button
                                        class="flex-shrink-0 p-1 text-gray-400 rounded-full hover:text-gray-900 hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                            </path>
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="relative grid gap-1 bg-white px-1 py-1">
                                        <div class="w-full p-3 bg-white rounded flex">
                                            <div tabindex="0" aria-label="loading icon" role="img"
                                                class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg7.svg"
                                                    alt="icon">

                                            </div>
                                            <div class="pl-3">
                                                <p tabindex="0" class="focus:outline-none text-sm leading-none">
                                                    Shipmet delayed for order<span class="text-indigo-700">
                                                        #25551</span></p>
                                                <p tabindex="0"
                                                    class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">
                                                    2 hours ago</p>
                                            </div>
                                        </div>

                                    </div>
                                </x-slot>
                            </x-dropdown>

                            <!-- Profile dropdown -->
                            <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false"
                                class="ml-3 relative">

                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button type="button"
                                            class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50">
                                            <x-user-avatar class="h-8 w-8" />
                                            <span class="hidden ml-3 text-gray-700 text-sm font-medium lg:block"><span
                                                    class="sr-only">Open user menu for
                                                </span>{{ Auth::user()->name }}</span>
                                            <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block"
                                                x-description="Heroicon name: solid/chevron-down"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Authentication -->
                                        <x-dropdown-link :href="route('login')">
                                            {{ __('My Profile') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('login')">
                                            {{ __('Update Password') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                {{ __('Sign Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>




                            </div>
                        </div>
                    </div>
                </div>
                <main class="flex-1 pb-8 bg-gray-50">
                    <!-- Page Heading -->
                    @if (isset($tools))
                    <div class="bg-white shadow">
                        {{ $tools }}
                    </div>
                    @endif
                    <x-banner/>
                    
                    {{ $slot }}
                    
                </main>
            </div>
        </div>

    </div>
    @livewireScripts
</body>

</html>