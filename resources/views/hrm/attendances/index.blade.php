<x-hrm-layout>
    <x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Attendance 
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

                <a href="{{route('hrm.attendances.create')}}"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                    Add Attendance
                </a>

                
            </div>
        </div>
    </x-slot>
@can('read all attendance')
    <x-slot name="filters">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <form>

                <div class="pb-5 flex items-center">

                    <div class="mr-4">
                        <x-input type="date" name="start_date" class="block mt-1 w-full"
                                value="{{old('start_date')}}" />

                    </div>
                    <div class="mr-4">
                        <x-input type="date" name="end_date" class="block mt-1 w-full"
                                value="{{old('end_date')}}" />

                    </div>
                    <div class="mr-4">
                        @livewire('search-dropdown', [
                        'name' => 'filter[employee_id]',
                        'model' => 'App\Models\Hrm\Employee',
                        'placeholder' => 'Select Employee',
                        'headerfield' => 'staff_id',
                        'selectfield' => 'id',
                        'displayfields' => [['name','name_dv'],['permanent_address','permanent_address_dv']],
                        'searchfields' => ['staff_id','name','name_dv','permanent_address','permanent_address_dv'],
                        'value' => old('filter[employee_id]')])

                    </div>


                    <div class="flex ml-2">
                        <button type="submit"
                            class="inline-flex justify-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 block mt-1">
                            Filter 
                        </button>
                    </div>

                    <div class="flex ml-2">
                        <a href="{{route('hrm.attendances.index')}}"
                            class="inline-flex justify-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 block mt-1">
                            Clear
                        </a>
                    </div>
            </form>

        </div>
        </div>

    </x-slot>
    @endcan

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Employee
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Date
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Duty
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Status
                        </th>

                        <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($attendances as $attendance)
                
                    <tr>
                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-900 sm:pl-6">{{$attendance->employee->name}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$attendance->duty->date->format('d-m-Y')}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$attendance->duty->check_in_end->format('H:i')}}-{{$attendance->duty->check_out_start->format('H:i')}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$attendance->status}}</td>
                        <td class="flex justify-between relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="" class="text-indigo-600 hover:text-indigo-900">Attendance Logs</a> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col justify-between my-5">
            {{$attendances->links()}}
        </div>
    </div>
</x-hrm-layout>