<div x-show="open" class="fixed inset-0 flex z-40 lg:hidden"
    x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
    aria-modal="true" style="display: none;">

    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
        class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="open = false" aria-hidden="true" style="display: none;">
    </div>

    <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        x-description="Off-canvas menu, show/hide based on off-canvas menu state."
        class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800" style="display: none;">

        <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-description="Close button, show/hide based on off-canvas menu state."
            class="absolute top-0 right-0 -mr-12 pt-2" style="display: none;">
            <button type="button"
                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                @click="open = false">
                <span class="sr-only">Close sidebar</span>
                <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/x"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="flex-shrink-0 flex items-center px-4">
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
        <nav class="mt-5 flex-1 flex flex-col divide-y divide-gray-800 overflow-y-auto" aria-label="Sidebar">
            <div class="px-2 space-y-1">
                <x-hrm.nav-link :href="route('hrm.dashboard')" :active="request()->routeIs('hrm.dashboard')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path d="M3 3h7v7H3z"></path>
                        <path d="M14 3h7v7h-7z"></path>
                        <path d="M14 14h7v7h-7z"></path>
                        <path d="M3 14h7v7H3z"></path>
                    </svg>
                    Dashboard
                </x-hrm.nav-link>
                @can('read worksite')
                <x-hrm.nav-link :href="route('hrm.worksites.index')" :active="request()->routeIs('hrm.worksites.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
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
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path>
                    </svg>
                    Departments
                </x-hrm.nav-link>
                @endcan

                @can('read job')
                <x-hrm.nav-link :href="route('hrm.jobs.index')" :active="request()->routeIs('hrm.jobs.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <rect width="20" height="14" x="2" y="7" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    Jobs
                </x-hrm.nav-link>
                @endcan

                @can('read employee')
                <x-hrm.nav-link :href="route('hrm.employees.index')" :active="request()->routeIs('hrm.employees.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
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

                @can('read duty')
                <x-hrm.nav-link :href="route('hrm.duties.index')" :active="request()->routeIs('hrm.duties.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                        <path d="M16 2v4"></path>
                        <path d="M8 2v4"></path>
                        <path d="M3 10h18"></path>
                    </svg>
                    Duties
                </x-hrm.nav-link>
                @endcan

                @can('read attendance')
                <x-hrm.nav-link :href="route('hrm.attendances.index')" :active="request()->routeIs('hrm.attendances.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <path d="M8.5 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                        <path d="m17 11 2 2 4-4"></path>
                    </svg>
                    Attendances
                </x-hrm.nav-link>
                @endcan
                
            </div>

        </nav>
    </div>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
</div>