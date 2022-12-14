<form method="post"
    action="{{ $worksite->id ? route('hrm.worksites.update', $worksite) : route('hrm.worksites.store')}}" enctype="multipart/form-data">
    @csrf
    @method($worksite->id? 'PATCH' : '')

    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Code</label>
            <div>
                <x-input type="text" name="code"  class="block mt-1 w-full" value="{{old('code',$worksite->code)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Name</label>
            <div>
                <x-input type="text" name="name"  class="block mt-1 w-full" value="{{old('name',$worksite->name)}}" />
            </div>
        </div>
        
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Head</label>
            <select name="employee_id"
                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                >
                @foreach($employees as $employee)
                <option value="{{$employee->id}}" 
                @selected(old('employee_id', $worksite->employee_id) == $employee->id)> 
                {{$employee->name}}
                </option>
                @endforeach
            </select>
        </div>
        
        

    </div>
    <!-- form buttons -->

    <div class="pt-5">
      <div class="flex justify-end">
        <a href="{{route('hrm.worksites.index')}}" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>
        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
      </div>
    </div>

</form>