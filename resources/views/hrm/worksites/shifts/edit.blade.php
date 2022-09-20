<x-hrm-layout>
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                Shift
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0 sm:ml-4">
            
            <a href="{{route('hrm.worksites.shifts.index', compact('worksite'))}}"
                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                Back to list
            </a>
        </div>
    </div>

    <x-validation-errors class="mb-4 bg-red-200" />

    <!-- Projects table (small breakpoint and up) -->
    <div class="sm:block">
        <div class="align-middle inline-block min-w-full px-4 py-4 sm:px-6 lg:px-8">
            
            @include('hrm.worksites.shifts._form',[$worksite, $shift])
        </div>
    </div>
</x-hrm-layout>