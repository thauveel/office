<div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow bg-gray-800 pt-5 pb-4">
        <div class="flex items-center flex-shrink-0 px-4">
            <svg class="h-8 w-auto text-white" fill="currentColor" stroke="0.5" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M6.625 2.655A9 9 0 0119 11a1 1 0 11-2 0 7 7 0 00-9.625-6.492 1 1 0 11-.75-1.853zM4.662 4.959A1 1 0 014.75 6.37 6.97 6.97 0 003 11a1 1 0 11-2 0 8.97 8.97 0 012.25-5.953 1 1 0 011.412-.088z"
                    clip-rule="evenodd"></path>
                <path fill-rule="evenodd"
                    d="M5 11a5 5 0 1110 0 1 1 0 11-2 0 3 3 0 10-6 0c0 1.677-.345 3.276-.968 4.729a1 1 0 11-1.838-.789A9.964 9.964 0 005 11zm8.921 2.012a1 1 0 01.831 1.145 19.86 19.86 0 01-.545 2.436 1 1 0 11-1.92-.558c.207-.713.371-1.445.49-2.192a1 1 0 011.144-.83z"
                    clip-rule="evenodd"></path>
                <path fill-rule="evenodd"
                    d="M10 10a1 1 0 011 1c0 2.236-.46 4.368-1.29 6.304a1 1 0 01-1.838-.789A13.952 13.952 0 009 11a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
        <nav class="mt-5 flex-shrink-0 h-full divide-y divide-gray-800 overflow-y-auto" aria-label="Sidebar">
            <div class="px-2 space-y-1">
                <x-hrm.nav-link :href="route('hrm.dashboard')" :active="request()->routeIs('hrm.dashboard')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                        <path d="M3 9h18"></path>
                        <path d="M9 21V9"></path>
                    </svg>
                    Dashboard
                </x-hrm.nav-link>

                @can('read worksite')
                <x-hrm.nav-link :href="route('hrm.worksites.index')" :active="request()->routeIs('hrm.worksites.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <path d="M12 7a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path>
                    </svg>
                    Worksites
                </x-hrm.nav-link>
                @endcan

                @can('read department')
                <x-hrm.nav-link :href="route('hrm.departments.index')" :active="request()->routeIs('hrm.departments.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path d="M8 6h13"></path>
                        <path d="M8 12h13"></path>
                        <path d="M8 18h13"></path>
                        <path d="M3 6h.01"></path>
                        <path d="M3 12h.01"></path>
                        <path d="M3 18h.01"></path>
                    </svg>
                    Deparments
                </x-hrm.nav-link>
                @endcan

                @can('read job')
                <x-hrm.nav-link :href="route('hrm.jobs.index')" :active="request()->routeIs('hrm.jobs.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path d="M8 6h13"></path>
                        <path d="M8 12h13"></path>
                        <path d="M8 18h13"></path>
                        <path d="M3 6h.01"></path>
                        <path d="M3 12h.01"></path>
                        <path d="M3 18h.01"></path>
                    </svg>
                    Jobs
                </x-hrm.nav-link>
                @endcan

                @can('read employee')
                <x-hrm.nav-link :href="route('hrm.employees.index')" :active="request()->routeIs('hrm.employees.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <path d="M9 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Employees
                </x-hrm.nav-link>
                @endcan


            </div>

        </nav>
    </div>
</div>