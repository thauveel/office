<x-hrm-layout>
    <x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Employees
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

                <a href="{{route('hrm.employees.create')}}"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                    Add Employee
                </a>
            </div>
        </div>
    </x-slot>


    <div class="px-4 sm:px-6 lg:px-8">
        <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Name
                        </th>

                        <th scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                            Title
                        </th>

                        <th scope="col" 
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Status
                        </th>

                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($employees as $employee)
                    <tr>
                        <td
                            class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">

                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    <x-avatar class="h-10 w-10" name="{{$employee->name}}" />
                                    
                                    
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$employee->name}} ({{$employee->staff_id}})
                                    </div>
                                    <div class="text-gray-500">{{$employee->email}}</div>
                                    <dl class="font-normal lg:hidden">
                                        <dt class="sr-only">Title</dt>
                                        <dd class="mt-1 truncate text-gray-700">{{$employee->job->name}}</dd>
                                        <dt class="sr-only sm:hidden">Department</dt>
                                        <dd class="mt-1 truncate text-gray-500">{{$employee->job->department->name}} in {{$employee->job->department->worksite->name}}</dd>
                                    </dl>
                                </div>

                            </div>
                            
                        </td>

                        <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                            <div class="text-gray-900">{{$employee->job->name}}</div>
                            <div class="text-gray-500">{{$employee->job->department->name}} in {{$employee->job->department->worksite->name}}</div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            @if($employee->is_active)
                                <span class='inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800'> Active </span> 
                            @else
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800"> Inactive </span>
                            @endif
                        </td>
                        
                        <td
                            class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 flex justify-between justify-items-center">
                            <a href="{{route('hrm.employees.edit', compact('employee')) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <a href="{{route('hrm.employees.show', compact('employee')) }}"
                                class="text-indigo-600 hover:text-indigo-900">View</a>
                            <form name="employee-{{$employee->id}}"
                                action="{{route('hrm.employees.destroy',compact('employee'))}}" method="POST">
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
            {{$employees->links()}}
        </div>
    </div>
</x-hrm-layout>