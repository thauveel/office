<x-hrm-layout>
    <x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Departments
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

                <a href="{{route('hrm.departments.create')}}"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                    Add Department
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
                            Name</th>
                        <th scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Alias
                        </th>
                        <th scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Email
                        </th>
                        <th scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Work Site
                        </th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($departments as $department)
                    <tr>
                        <td
                            class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                            {{$department->name}}
                            <dl class="font-normal lg:hidden">
                                <dt class="sr-only">Title</dt>
                                <dd class="mt-1 truncate text-gray-700">{{$department->alias}}</dd>
                                <dt class="sr-only sm:hidden">Email</dt>
                                <dd class="mt-1 truncate text-gray-500 sm:hidden">{{$department->email}}</dd>
                            </dl>
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{$department->alias}}</td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{$department->email}}</td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">{{$department->worksite->name}}</td>
                        <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 flex justify-between justify-items-center">
                            <a href="{{route('hrm.departments.edit', compact('department')) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form name="dep-{{$department->id}}"
                                action="{{route('hrm.departments.destroy',compact('department'))}}" method="POST">
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
            {{$departments->links()}}
        </div>
    </div>
</x-hrm-layout>