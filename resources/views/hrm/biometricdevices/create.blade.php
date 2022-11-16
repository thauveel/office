<x-hrm-layout>

<x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Biometric Device
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

                <a href="{{route('hrm.biometricdevices.index')}}"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <x-validation-errors class="mb-4 bg-red-200" />

    <!-- Projects table (small breakpoint and up) -->
    <div class="sm:block">
        <div class="align-middle inline-block min-w-full px-4 py-4 sm:px-6 lg:px-8">
        @include('hrm.biometricdevices._form',[$device, $worksites])
        </div>
    </div>
</x-hrm-layout>