<form method="post"
    action="{{ $employee->uuid ? route('hrm.employees.update', $employee) : route('hrm.employees.store')}}" enctype="multipart/form-data">
    @csrf
    @method($employee->uuid? 'PATCH' : '')

    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Staff ID / RCN</label>
            <div>
                <x-input type="text" name="staff_id"  class="block mt-1 w-full" value="{{old('staff_id',$employee->staff_id)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Name</label>
            <div>
                <x-input type="text" name="name"  class="block mt-1 w-full" value="{{old('name',$employee->name)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Name</label>
            <div>
                <x-input type="text" name="name_dv"  class="block mt-1 w-full" value="{{old('name_dv',$employee->name)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Date of Birth</label>
            <div>
                <x-input type="date" name="birth_day" class="block mt-1 w-full" value="{{old('birth_day',$employee->birth_day)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Gender</label>
            <div>
                <select name="gender"
                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    value="maldivian">
                    <option value="male" {{old('gender',$employee->gender) == 'male' ? 'selected' : ''}}>Male</option>
                    <option value="female" {{old('gender',$employee->gender) == 'female' ? 'selected' : ''}}>Female</option>
                </select>
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Nationality</label>
            <div>
                <select name="nationality"
                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    value="maldivian">
                    <option value="{{old('nationality',$employee->nationality) ? $employee->nationality : 'maldivian' }}">{{old('nationality',$employee->nationality) ? $employee->nationality : 'Maldivian' }}</option>
                    @foreach(App\Models\Hrm\Employee::NATIONALITIES as $nationality)
                    <option value="{{$nationality}}" {{old('nationality',$employee->nationality) == $nationality ? 'selected' : ''}} > {{$nationality}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Job</label>
            <select name="employee_id"
                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                >
                @foreach($jobs as $job)
                <option value="{{$job->uuid}}" 
                @selected(old('job_id', $employee->job_id) == $job->uuid)> 
                {{$job->name}}
                </option>
                @endforeach
            </select>
        </div>
        
        

    </div>
    <!-- form buttons -->

    <div class="pt-5">
      <div class="flex justify-end">
        <a href="{{route('hrm.employees.index')}}" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>
        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
      </div>
    </div>

</form>