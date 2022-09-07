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
            <label class="uppercase text-xs text-gray-600 font-medium">Name DV</label>
            <div>
                <x-input type="text" name="name_dv"  class="thaana block mt-1 w-full" value="{{old('name_dv',$employee->name)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Date of Birth {{$employee->birth_date}}</label>
            <div>
                <x-input type="date" name="birth_date" class="block mt-1 w-full" value="{{old('birth_date',$employee->birth_date ? $employee->birth_date->format('Y-m-d') : '' )}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Gender</label>
            <div>
                <select name="gender"
                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    value="maldivian">
                    <option value="male" @selected(old('department_id', $employee->gender) == 'male')>Male</option>
                    <option value="female" @selected(old('department_id', $employee->gender) == 'female')>Female</option>
                </select>
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Nationality</label>
            <div>
                <select name="nationality"
                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    value="maldivian">
                    @foreach(App\Models\Hrm\Employee::NATIONALITIES as $nationality)
                    <option value="{{$nationality}}" @selected(old('worksite_id', $employee->nationality) == $nationality) > {{$nationality}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">National Identity Card</label>
            <div>
                <x-input type="text" name="nid" class="block mt-1 w-full" value="{{old('nid',$employee->nid)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Passport</label>
            <div>
                <x-input type="text" name="passport" class="block mt-1 w-full" value="{{old('passport',$employee->passport)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Joined Date</label>
            <div>
                <x-input type="date" name="joined_date" class="block mt-1 w-full" value="{{old('joined_date',$employee->joined_date? $employee->joined_date->format('Y-m-d') : '')}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Probation End Date</label>
            <div>
                <x-input type="date" name="probation_end_date" class="block mt-1 w-full" value="{{old('probation_end_date',$employee->probation_end_date? $employee->probation_end_date->format('Y-m-d') : '')}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Term End Date</label>
            <div>
                <x-input type="date" name="term_end_date" class="block mt-1 w-full" value="{{old('term_end_date', $employee->term_end_date? $employee->term_end_date->format('Y-m-d') : '')}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Marital Status</label>
            <div>
                <select name="merital_status"
                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                    value="maldivian">
                    <option value="unkown" {{old('merital_status',$employee->merital_status) == 'unkown' ? 'selected' : ''}}>Unkown</option>
                    <option value="single" {{old('merital_status',$employee->merital_status) == 'single' ? 'selected' : ''}}>Single</option>
                    <option value="married" {{old('merital_status',$employee->merital_status) == 'married' ? 'selected' : ''}}>Married</option>
                    <option value="widowed" {{old('merital_status',$employee->merital_status) == 'widowed' ? 'selected' : ''}}>Widowed</option>
                    <option value="separated" {{old('merital_status',$employee->merital_status) == 'separated' ? 'selected' : ''}}>Seperated</option>
                </select>
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Phone</label>
            <div>
                <x-input type="tel" name="phone" pattern="[0-9]{10}" class="block mt-1 w-full" value="{{old('phone',$employee->phone)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Email</label>
            <div>
                <x-input type="email" name="email" class="block mt-1 w-full" value="{{old('email',$employee->email)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Permanent Address</label>
            <div>
                <textarea rows="3" type="text" name="permanent_address"
                    class="block w-full mt-1 border border-gray-200 border-gray-300 form-input rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{old('permanent_address',$employee->permanent_address)}}</textarea>
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Permanent Address DV</label>
            <div>
                <textarea rows="3" type="text" name="permanent_address_dv"
                    class="thaana block w-full mt-1 border border-gray-200 border-gray-300 form-input rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{old('permanent_address_dv',$employee->permanent_address_dv)}}</textarea>
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Current Address</label>
            <div>
                <textarea rows="3" type="text" name="current_address"
                    class="block w-full mt-1 border border-gray-200 border-gray-300 form-input rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{old('current_address',$employee->current_address)}}</textarea>
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Current Address DV</label>
            <div>
                <textarea rows="3" type="text" name="current_address_dv"
                    class="thaana block w-full mt-1 border border-gray-200 border-gray-300 form-input rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{old('current_address_dv',$employee->current_address_dv)}}</textarea>
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Emergency Contact Person</label>
            <div>
                <x-input type="text" name="emegency_contact_name" class="block mt-1 w-full" value="{{old('emegency_contact_name',$employee->emegency_contact_name)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Emergency Contact</label>
            <div>
                <x-input type="text" name="emegency_contact" class="block mt-1 w-full" value="{{old('emegency_contact',$employee->emegency_contact)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Emergency Contact relation</label>
            <div>
                <x-input type="text" name="emegency_contact_relation" class="block mt-1 w-full" value="{{old('emegency_contact_relation',$employee->emegency_contact_relation)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Basic Salary</label>
            <div>
                <x-input type="number" name="basic_salary" min="0" value="0" step="0.01"  pattern="^\d+(?:\.\d{1,2})?$" class="block mt-1 w-full" value="{{old('basic_salary',$employee->basic_salary)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Biometric Device ID</label>
            <div>
                <x-input type="text" name="biometric_device_id" class="block mt-1 w-full" value="{{old('biometric_device_id',$employee->biometric_device_id)}}" />
            </div>
        </div>
        
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Job</label>
            <select name="job_id"
                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                >
                @foreach($jobs as $job)
                <option value="{{$job->uuid}}" 
                @selected(old('job_id', $employee->job_id) == $job->uuid)>
                {{$job->name}} ({{$job->code}}) in {{$job->department->alias}} in {{$job->department->worksite->code}}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">User</label>
            <select name="user_id"
                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                >
                <option value="" >
                --
                </option>
                @foreach($admin_users as $user)
                <option value="{{$user->id}}" 
                @selected(old('user_id', $employee->user_id) == $user->id)>
                {{$user->name}} : {{$user->email}}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            
            <div class="my-2">
                <input value="0" type="hidden" name="is_active">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active"
                value="1" 
                @checked(old('is_active', $employee->is_active))/>
                <span class="ml-2 text-sm text-gray-600">Active</span>
            </div>
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