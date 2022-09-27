<x-hrm-layout>

    <!-- Projects table (small breakpoint and up) -->
    <div class="sm:block">
        <div class="align-middle inline-block min-w-full px-4 py-4 sm:px-6 lg:px-8">
            <article>
                <!-- Profile header -->
                <div>
                    <div class="rounded rounded-lg">
                        <img class="h-32 w-full object-cover lg:h-48" src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="">
                    </div>
                    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                        <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                            <div class="flex">
                                <x-avatar class="h-32 w-32 ring-4 ring-white sm:h-32 sm:w-32" name="{{$employee->name}}" />
                                
                            </div>
                            <div
                                class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                <div class="mt-6 min-w-0 flex-1 sm:hidden 2xl:block">
                                    <h1 class="truncate text-2xl font-bold text-gray-900">{{$employee->name}}</h1>
                                </div>
                                <div
                                    class="justify-stretch mt-6 flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                                    <button type="button"
                                        class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                                        <!-- Heroicon name: mini/envelope -->
                                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                            <path
                                                d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                        </svg>
                                        <span>Message</span>
                                    </button>
                                    <button type="button"
                                        class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                                        <!-- Heroicon name: mini/phone -->
                                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Call</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 hidden min-w-0 flex-1 sm:block 2xl:hidden">
                            <h1 class="truncate text-2xl font-bold text-gray-900">{{$employee->name}}</h1>
                        </div>
                    </div>
                </div>
            <div x-data="{tab: 1}">
                <!-- Tabs -->
                <div class="mt-6 sm:mt-2 2xl:mt-5">
                    <div class="border-b border-gray-200">
                        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                <a href="#"
                                @click.prevent="tab = 1" :class="{'border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm': tab === 1, 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm': tab !== 1}">Profile</a>

                                <a href="#"
                                @click.prevent="tab = 2" :class="{'border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm': tab === 2, 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm': tab !== 2}">Basic</a>
                                
                                <a href="#"
                                @click.prevent="tab = 3" :class="{'border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm': tab === 3, 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm': tab !== 3}">Addresses</a>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Description list -->
                <div class="mx-auto mt-6 max-w-5xl px-4 sm:px-6 lg:px-8"
                x-show="tab === 1" x-transition:enter.duration.500ms>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->phone}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->email}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Title</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->job->name}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Team</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->job->department->name}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Location</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->job->department->worksite->name}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Joined on</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->joined_date->format('F d, Y')}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Salary</dt>
                            <dd class="mt-1 text-sm text-gray-900">MVR{{$employee->basic_salary}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Birthday</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->birth_date?$employee->birth_date->format('F d, Y'):''}}</dd>
                        </div>

                        
                    </dl>
                </div>

                <!-- Description list -->
                <div class="mx-auto mt-6 max-w-5xl px-4 sm:px-6 lg:px-8"
                x-show="tab === 2" x-transition:enter.duration.500ms>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Staff ID</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->staff_id}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Gender</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->staff_id}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Nationality</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->nationality}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">National Identification</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->nid}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Passport</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->passport}}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Marital Status</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{$employee->merital_status}}</dd>
                        </div>

                        

                        
                    </dl>
                </div>

                <!-- Description list -->
                <div class="mx-auto mt-6 max-w-5xl px-4 sm:px-6 lg:px-8"
                x-show="tab === 3" x-transition:enter.duration.500ms>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Permanent Address</dt>
                            <dd class="mt-1 text-sm text-gray-900"><address>{!! nl2br( e($employee->permanent_address)) !!}</address></dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Current Address</dt>
                            <dd class="mt-1 text-sm text-gray-900"><address>{!! nl2br( e($employee->current_address)) !!}</address></dd>
                        </div>
                        
                    </dl>
                </div>
            
                <!-- Team member list -->
                <!-- <div class="mx-auto mt-8 max-w-5xl px-4 pb-12 sm:px-6 lg:px-8"
                x-show="tab === 1" x-transition:enter.duration.500ms>
                    <h2 class="text-sm font-medium text-gray-500">Team members</h2>
                    <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div
                            class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-pink-500 focus-within:ring-offset-2 hover:border-gray-400">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </div>
                            <div class="min-w-0 flex-1">
                                <a href="#" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900">Leslie Alexander</p>
                                    <p class="truncate text-sm text-gray-500">Co-Founder / CEO</p>
                                </a>
                            </div>
                        </div>

                        <div
                            class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-pink-500 focus-within:ring-offset-2 hover:border-gray-400">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </div>
                            <div class="min-w-0 flex-1">
                                <a href="#" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900">Michael Foster</p>
                                    <p class="truncate text-sm text-gray-500">Co-Founder / CTO</p>
                                </a>
                            </div>
                        </div>

                        <div
                            class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-pink-500 focus-within:ring-offset-2 hover:border-gray-400">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </div>
                            <div class="min-w-0 flex-1">
                                <a href="#" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900">Dries Vincent</p>
                                    <p class="truncate text-sm text-gray-500">Manager, Business Relations</p>
                                </a>
                            </div>
                        </div>

                        <div
                            class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-pink-500 focus-within:ring-offset-2 hover:border-gray-400">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </div>
                            <div class="min-w-0 flex-1">
                                <a href="#" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900">Lindsay Walton</p>
                                    <p class="truncate text-sm text-gray-500">Front-end Developer</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                </div>
            </article>
        </div>
    </div>
    

</x-hrm-layout>