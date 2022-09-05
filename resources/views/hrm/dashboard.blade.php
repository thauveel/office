<x-hrm-layout>
    <x-slot name="tools">
        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Dashboard
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                
                <button type="button"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:gray-purple-500 sm:order-1 sm:ml-3">
                    Apply for a Leave
                </button>
            </div>
        </div>
    </x-slot>
    <!-- Pinned leave balance -->
    <div class="px-4 mt-6 sm:px-6 lg:px-8">
        <h2 class="text-gray-900 text-sm font-medium">Leave Balance</h2>
        <ul role="list" class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3" x-max="1">

            <li class="relative col-span-1 flex shadow-sm rounded-md">
                <x-dashboard-card initial='AP' name='Medical Sick Leave' description='12 remaining' color='bg-orange-600' route='dashboard'/>
            </li>

            <li class="relative col-span-1 flex shadow-sm rounded-md">
                <x-dashboard-card initial='SL' name='Sick Leave' description='15 remaining' color='bg-yellow-600' route='dashboard'/>
            </li>

            <li class="relative col-span-1 flex shadow-sm rounded-md">
                <x-dashboard-card initial='FRL' name='Family Leave' description='8 remaining' color='bg-purple-600' route='dashboard'/>
            </li>

            <li class="relative col-span-1 flex shadow-sm rounded-md">
                <x-dashboard-card initial='AL' name='Annual Leave' description='19 remaining' color='bg-green-600' route='dashboard'/>
            </li>

        </ul>
    </div>


    <!-- Schedule table (small breakpoint and up) -->
    <div class="mt-8 sm:block">
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr class="border-t border-gray-200">
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-900"
                            scope="col">
                            <span class="lg:pl-2">Date</span>
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-900"
                            scope="col">
                            Check In
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-900"
                            scope="col">
                            Check Out
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-900"
                            scope="col">
                            Break Out
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-900"
                            scope="col">
                            Break In
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-900"
                            scope="col">
                            Late
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-900"
                            scope="col">
                            Total Working Hrs
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">

                    <tr>
                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-black">
                            20-aug-2022
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-black">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800"> 08:00 </span>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-black">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800"> 14:00 </span>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-black">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800"> 12:00 </span>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-black">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800"> 12:30 </span>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-black">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800"> 00:00 </span>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-black">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800"> 05:30 </span>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</x-hrm-layout>