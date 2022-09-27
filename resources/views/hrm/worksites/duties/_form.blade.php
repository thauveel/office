<form method="post"
    action="{{ $duty->id ? route('hrm.worksites.duties.update', compact('worksite','duty')) : route('hrm.worksites.duties.store',$worksite)}}" enctype="multipart/form-data">
    @csrf
    @method($duty->id? 'PATCH' : '')

    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Date</label>
            <div>
                <x-input type="date" name="date"  class="block mt-1 w-full" value="{{old('date',$duty->date)}}" />
            </div>
        </div>

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Shift</label>
           
        @livewire('search-dropdown', [
        'name' => 'shift_id', 
        'model' => 'App\Models\Hrm\SHift', 
        'placeholder' => 'Select Shift',
        'headerfield' => 'id',
        'selectfield' => 'id',
        'displayfields' => [['check_in_end','check_out_start'],['break_allowed_duration']],
        'searchfields' => ['check_in_end','check_out_start','break_allowed_duration'],
        'value' => old('shift_id',$duty->shift_id)])
        </div>
        

        <div>
            <label class="uppercase text-xs text-gray-600 font-medium">Employee</label>
           
        @livewire('search-dropdown', [
        'name' => 'employee_id', 
        'model' => 'App\Models\Hrm\Employee', 
        'placeholder' => 'Select Employee',
        'headerfield' => 'staff_id',
        'selectfield' => 'id',
        'displayfields' => [['name','name_dv'],['permanent_address','permanent_address_dv']],
        'searchfields' => ['name','name_dv','permanent_address','permanent_address_dv'],
        'value' => old('employee_id',$duty->employee_id)])
        </div>

    </div>
    <!-- form buttons -->

    <div class="pt-5">
      <div class="flex justify-end">
        <a href="{{route('hrm.worksites.duties.index',compact('worksite'))}}" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>
        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
      </div>
    </div>

</form>