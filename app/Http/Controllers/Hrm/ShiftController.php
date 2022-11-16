<?php

namespace App\Http\Controllers\Hrm;

use App\Models\hrm\Duty;
use Carbon\CarbonPeriod;
use App\Models\hrm\Shift;
use App\Models\Hrm\WorkSite;
use Illuminate\Http\Request;
use App\Concerns\FilterMultiFields;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Hrm\StoreShiftRequest;
use App\Http\Requests\Hrm\UpdateShiftRequest;
use App\Http\Requests\Hrm\AssignDutytoEmployeeRequest;
use App\Models\hrm\Attendance;
use Illuminate\Support\Arr;

class ShiftController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Shift::class, 'shift');
    }

   /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(WorkSite $worksite, Request $request)
    {
        $shifts = QueryBuilder::for(Shift::where('work_site_id',$worksite->id))
        ->defaultSort('-created_at')
        ->select('shifts.*')
        ->paginate(10)
        ->appends(request()->query());;
        $request->flash();
        
        return view('hrm.worksites.shifts.index',compact('shifts','worksite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WorkSite $worksite)
    {
        $shift = new Shift();
        return view('hrm.worksites.shifts.create',compact('worksite','shift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign(WorkSite $worksite, Shift $shift)
    {
        $departments = $worksite->departments;
        $employees = [];
        foreach ($departments as $department){
            foreach ($department->jobs as $job){
                foreach( $job->employees as $employee){
                    array_push($employees,$employee);
                }
             
            }
        }

        return view('hrm.worksites.shifts.assign',compact('worksite','shift','employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AssignDutytoEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function assignto(WorkSite $worksite,Shift $shift, AssignDutytoEmployeeRequest $request)
    {
        
        $data = $request->validated();
        $dateRange = CarbonPeriod::create($data['date_from'], $data['date_to']);
        foreach($data['employees'] as $employee)
        {
            foreach($dateRange as $date) {
                $duty = new Duty();
                $duty->date = $date;
                $duty->employee_id = $employee;
                $duty->shift_id = $shift->id;
                $duty->color = $shift->color;
                $duty->check_in_start = $shift->check_in_start;
                $duty->check_in_end = $shift->check_in_end;
                $duty->break_start = $shift->break_start;
                $duty->break_end = $shift->break_end;
                $duty->break_allowed_duration = $shift->break_allowed_duration;
                $duty->check_out_start = $shift->check_out_start;
                $duty->check_out_end = $shift->check_out_end;
                $duty->must_complete_for_attendance = true;
                $duty->save();
     
                $attendance = new Attendance();
                $attendance->employee_id = $employee;
                $attendance->duty_id = $duty->id;
                $attendance->save();
             }
        }
        

       return redirect()->route('hrm.worksites.shifts.index', compact('worksite'))->withSuccess('Duty created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkSite $worksite, StoreShiftRequest $request)
    {
        $data = $request->validated();
        

        $department = $worksite->shifts()->create($data);
        return redirect()->route('hrm.worksites.shifts.index', compact('worksite'))->withSuccess('Shift created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(WorkSite $worksite, Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkSite $worksite, Shift $shift)
    {
        return view('hrm.worksites.shifts.edit',compact('worksite','shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShiftRequest  $request
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(WorkSite $worksite, Shift $shift, UpdateShiftRequest $request)
    {
        $data = $request->validated();

        $shift->update($data);
        return redirect()->route('hrm.worksites.shifts.index', compact('worksite'))->withSuccess('Shift updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkSite $worksite, Shift $shift)
    {
        $shift->delete();

        return redirect()->route('hrm.worksites.shifts.index', compact('worksite'))->withSuccess('Shift deleted successfully.');
    }
}
