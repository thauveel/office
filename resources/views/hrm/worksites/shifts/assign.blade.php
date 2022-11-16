<x-hrm-layout>

    <x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Asigning Shift
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

                <a href="{{route('hrm.worksites.shifts.index', $worksite)}}"
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
            <form method="post"
                action="{{route('hrm.worksites.shifts.assignto', compact('worksite','shift'))}}"
                enctype="multipart/form-data">
                @csrf

                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                    <div>
                        <label class="uppercase text-xs text-gray-600 font-medium">Date from</label>
                        <div>
                            <x-input type="date" name="date_from" class="block mt-1 w-full"
                                value="{{old('date_from')}}" />
                        </div>
                    </div>

                    <div>
                        <label class="uppercase text-xs text-gray-600 font-medium">Date to</label>
                        <div>
                            <x-input type="date" name="date_to" class="block mt-1 w-full"
                                value="{{old('date_to')}}" />
                        </div>
                    </div>

                    <div>
                        <label class="uppercase text-xs text-gray-600 font-medium">Employee</label>

                        <select name="employees[]"
                            class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                            multiple = "multiple">
                            @foreach($employees as $employee)
                            <option value="{{$employee->id}}"> 
                            {{$employee->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <!-- form buttons -->

                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="{{route('hrm.worksites.shifts.index',compact('worksite'))}}"
                            class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>
                        <button type="submit"
                            class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-hrm-layout>