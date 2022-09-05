<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
    <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
        <!-- Logo -->
        <div class="absolute left-0 py-5 flex-shrink-0 lg:static">
            <a href="#">
                <span class="sr-only">UC Portal</span>
                <x-app-icon class="text-white" />
            </a>
        </div>

        <!-- Right section on desktop -->
        <div class="hidden lg:ml-4 lg:flex lg:items-center lg:py-5 lg:pr-0.5">
            <x-dropdown align="right" width="80">
                <x-slot name="trigger">
                    <button
                        class="flex-shrink-0 p-1 text-cyan-200 rounded-full hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white">
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
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
                                <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">
                                    2 hours ago</p>
                            </div>
                        </div>

                    </div>
                </x-slot>
            </x-dropdown>


            <!-- Profile dropdown -->
            <div class="ml-4 relative flex-shrink-0">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="bg-white rounded-full flex text-sm ring-2 ring-white ring-opacity-20 focus:outline-none focus:ring-opacity-100">
                            <x-user-avatar class="h-8 w-8" />
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

        <div class="w-full py-5 lg:border-t lg:border-white lg:border-opacity-20">
            <div class="lg:grid lg:grid-cols-3 lg:gap-8 lg:items-center">
                <!-- Left nav -->
                <div class="hidden lg:block lg:col-span-2">
                    <nav class="flex space-x-4">
                        <x-portal.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Home') }}
                        </x-portal.nav-link>

                        @if(Auth::user()->is_admin)
                        <x-portal.nav-link :href="route('staff.dashboard')" :active="request()->routeIs('staff.dashboard')">
                            {{ __('Staff Portal') }}
                        </x-portal.nav-link>
                        @endif
                    </nav>
                </div>
                <div class="px-12 lg:px-0">
                    <!-- Search -->
                    <div class="max-w-xs mx-auto w-full lg:max-w-md">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative text-white focus-within:text-gray-600">
                            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">

                            </div>
                            <div
                                class="block w-full text-white py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 focus:text-gray-900 placeholder-white focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-500 focus:ring-0 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu button -->
        <div class="absolute right-0 flex-shrink-0 lg:hidden">
            <!-- Mobile menu button -->
            <button type="button"
                class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-cyan-200 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white"
                @click="open = ! open" @mousedown="if (open) $event.preventDefault()" aria-expanded="false"
                :aria-expanded="open.toString()">
                <span class="sr-only">Open main menu</span>
                <svg x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6"
                    :class="{ 'hidden': open, 'block': !(open) }" x-description="Heroicon name: outline/menu"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
                <svg x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6"
                    :class="{ 'block': open, 'hidden': !(open) }" x-description="Heroicon name: outline/x"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</div>