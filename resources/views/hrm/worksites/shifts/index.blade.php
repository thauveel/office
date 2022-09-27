<x-hrm-layout>
    <x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Shifts for {{$worksite->name}}
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                <a href="{{route('hrm.worksites.shifts.create', compact('worksite'))}}"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                    Add Shift
                </a>

                <a href="{{route('hrm.worksites.index')}}"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                    Back to Worksites
                </a>
            </div>
        </div>
    </x-slot>


    <div class="px-4 sm:px-6 lg:px-8">
        <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Check In
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Check Out
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Work Duration
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Break From
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Break To
                        </th>
                        <th scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Break Duration
                        </th>
                        <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($shifts as $shift)
                    <tr>
                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-900 sm:pl-6">{{$shift->check_in_end->format('H:i')}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$shift->check_out_start->format('H:i')}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$shift->shift_total->format('H:i')}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$shift->break_start->format('H:i')}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$shift->break_end->format('H:i')}}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$shift->break_allowed_duration->format('H:i')}}</td>
                        <td class="flex justify-between relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="{{route('hrm.worksites.shifts.edit', compact('worksite','shift')) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <a href="{{route('hrm.worksites.shifts.assign', compact('worksite','shift')) }}" class="text-indigo-600 hover:text-indigo-900">Assign</a>
                            <form name="worksite-{{$worksite->id}}"
                                action="{{route('hrm.worksites.shifts.destroy',compact('worksite','shift'))}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                onclick="return confirm('Are you sure?')"
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
            {{$shifts->links()}}
        </div>
    </div>
</x-hrm-layout>