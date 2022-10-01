<x-hrm-layout>
    <x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Duties
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

                
            </div>
        </div>
    </x-slot>

    <x-slot name="filters">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <form>

                <div class="pb-5 flex items-center">

                    <div class="mr-4">
                        <x-input type="date" name="filter[date]" class="block mt-1 w-full"
                                value="{{old('filter.date')}}" />

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
                        'value' => old('employee_id')])

                    </div>


                    <div class="flex ml-2">
                        <button type="submit"
                            class="inline-flex justify-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 block mt-1">
                            Filter
                        </button>
                    </div>

                    <div class="flex ml-2">
                        <a href="{{route('hrm.duties.index')}}"
                            class="inline-flex justify-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 block mt-1">
                            Clear
                        </a>
                    </div>
            </form>

        </div>
        </div>

    </x-slot>


    <div class="px-4 sm:px-6 lg:px-8">
        <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Date
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Employee
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Duty
                        </th>

                        <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($duties as $duty)
                    <tr>
                        <td class="whitespace-nowrap text-sm text-gray-900 sm:pl-6">{{$duty->date->format('d-m-Y')}}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$duty->employee->name}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                            {{$duty->check_in_end->format('H:i')}}-{{$duty->check_out_start->format('H:i')}}</td>
                        <td
                            class="flex justify-between relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <form name="duty-{{$duty->id}}"
                                action="{{route('hrm.duties.destroy',compact('duty'))}}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"
                                    class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col justify-between my-5">
            {{$duties->links()}}
        </div>
    </div>
</x-hrm-layout>