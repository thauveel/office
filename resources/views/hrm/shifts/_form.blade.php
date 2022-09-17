<form method="post"
    action="{{ $shift->uuid ? route('hrm.shifts.update', $shift) : route('hrm.shifts.store')}}" enctype="multipart/form-data">
    @csrf
    @method($shift->uuid? 'PATCH' : '')

    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Date</label>
            <div>
                <x-input type="date" name="date"  class="block mt-1 w-full" value="{{old('date',$shift->date)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Type</label>
            <div>
                <select name="type"
                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                    @foreach(App\Models\Hrm\Shift::TYPES as $type)
                    <option value="{{$type}}" @selected(old('type', $shift->type) == $type) > {{$type}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if($shift->uuid)
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Status</label>
            <div>
                <select name="status"
                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                    @foreach(App\Models\Hrm\Shift::STATUS as $status)
                    <option value="{{$status}}" @selected(old('status', $shift->status) == $status) > {{$status}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Check In Start at</label>
            <div>
                <x-input type="time" name="check_in_start"  class="block mt-1 w-full" value="{{old('check_in_start',$shift->check_in_start)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Check In End at</label>
            <div>
                <x-input type="time" name="check_in_end"  class="block mt-1 w-full" value="{{old('check_in_end',$shift->check_in_end)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Break Start at</label>
            <div>
                <x-input type="time" name="break_start"  class="block mt-1 w-full" value="{{old('break_start',$shift->break_start)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Break End at</label>
            <div>
                <x-input type="time" name="break_end"  class="block mt-1 w-full" value="{{old('break_end',$shift->break_end)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Break Allowed Duration</label>
            <div>
                <x-input type="time" name="break_allowed_duration"  class="block mt-1 w-full" value="{{old('break_allowed_duration',$shift->break_allowed_duration)}}" />
            </div>
        </div>
        
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Check Out Start at</label>
            <div>
                <x-input type="time" name="checkout_start"  class="block mt-1 w-full" value="{{old('checkout_start',$shift->checkout_start)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Check Out End at</label>
            <div>
                <x-input type="time" name="checkout_end"  class="block mt-1 w-full" value="{{old('checkout_end',$shift->checkout_end)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Day Count</label>
            <div>
                <x-input type="number" name="work_day_count"  class="block mt-1 w-full" value="{{old('work_day_count',$shift->work_day_count)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Employee</label>
           
        @livewire('search-dropdown', [
        'name' => 'employee_id', 
        'model' => 'App\Models\Hrm\Employee', 
        'placeholder' => 'Select Employee',
        'headerfield' => 'staff_id',
        'selectfield' => 'uuid',
        'displayfields' => [['name','name_dv'],['permanent_address','permanent_address_dv']],
        'searchfields' => ['name','name_dv','permanent_address','permanent_address_dv'],
        'value' => old('employee_id',$shift->employee_id)])
        </div>

    </div>
    <!-- form buttons -->

    <div class="pt-5">
      <div class="flex justify-end">
        <a href="{{route('hrm.shifts.index')}}" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>
        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
      </div>
    </div>

</form>