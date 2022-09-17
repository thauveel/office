<form method="post"
    action="{{ $shift->uuid ? route('hrm.worksites.shifts.update', compact('worksite', 'shift')) : route('hrm.worksites.shifts.store', compact('worksite'))}}" enctype="multipart/form-data">
    @csrf
    @method($shift->uuid? 'PATCH' : '')

    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Day of Week</label>
            <div>
                <select name="day_of_week"
                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                    @foreach(App\Models\Hrm\Shift::DAYS as $day)
                    <option value="{{$day}}" @selected(old('day_of_week', $shift->day_of_week) == $day) > {{$day}}</option>
                    @endforeach
                </select>
            </div>
        </div>

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

        

    </div>
    <!-- form buttons -->

    <div class="pt-5">
      <div class="flex justify-end">
        <a href="{{route('hrm.worksites.shifts.index', $worksite)}}" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>
        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
      </div>
    </div>

</form>