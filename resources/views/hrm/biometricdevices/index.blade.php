<x-hrm-layout>
    <x-slot name="tools">
        <div class="px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                    Biometric Devices
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">

                <a href="{{route('hrm.biometricdevices.create')}}"
                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:order-1 sm:ml-3">
                    Add Device
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
                            Worksite
                        </th>

                        <th scope="col" 
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            IP
                        </th>

                        <th scope="col" 
                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Serial
                        </th>

                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($devices as $biometricdevice)
                    <tr>
                        <td
                            class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">

                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{$biometricdevice->name}} 
                                    </div>
                                    <dl class="font-normal lg:hidden">
                                        <dt class="sr-only">Title</dt>
                                        <dd class="mt-1 truncate text-gray-700">{{$biometricdevice->name }}</dd>
                                        <dt class="sr-only sm:hidden">Department</dt>
                                        <dd class="mt-1 truncate text-gray-500">{{$biometricdevice->ip}}</dd>
                                    </dl>
                                </div>

                            </div>
                            
                        </td>

                        <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                            <div class="text-gray-900">{{$biometricdevice->workSite->name}}</div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div class="text-gray-900">{{$biometricdevice->ip}}</div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div class="text-gray-900">{{$biometricdevice->serial}}</div>
                        </td>
                        <td
                            class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 flex justify-between justify-items-center">
                            <a href="{{route('hrm.biometricdevices.edit', compact('biometricdevice')) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <a href="{{route('hrm.biometricdevices.download',$biometricdevice)}}"
                                class="text-indigo-600 hover:text-indigo-900">Download Attendance Log</a>
                            <form name="device-{{$biometricdevice->id}}"
                                action="{{route('hrm.biometricdevices.destroy',$biometricdevice)}}" method="POST">
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
            {{$devices->links()}}
        </div>
    </div>
</x-hrm-layout>