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
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
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
                        <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path>
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
                        <rect width="20" height="14" x="2" y="7" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
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

                @can('read duty')
                <x-hrm.nav-link :href="route('hrm.duties.index')" :active="request()->routeIs('hrm.duties.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
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
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <path d="M8.5 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                        <path d="m17 11 2 2 4-4"></path>
                    </svg>
                    Attendances
                </x-hrm.nav-link>
                @endcan

                @can('read biometricdevice')
                <x-hrm.nav-link :href="route('hrm.biometricdevices.index')" :active="request()->routeIs('hrm.biometricdevices.*')">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6" x-description="Heroicon name: outline/home"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect>
                        <path d="M12 10a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                        <path d="M12 6h.01"></path>
                    </svg>
                    Biometric Devices
                </x-hrm.nav-link>
                @endcan

                

            </div>

        </nav>
    </div>
</div>