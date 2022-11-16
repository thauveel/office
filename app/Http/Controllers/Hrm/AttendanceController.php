<?php

namespace App\Http\Controllers\Hrm;

use Carbon\Carbon;
use App\Models\hrm\Duty;
use App\Models\Hrm\Employee;
use Illuminate\Http\Request;
use App\Models\hrm\Attendance;
use App\Concerns\FilterMultiFields;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\hrm\Shift;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Attendance::class, 'attendance');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->start_date){
            $start_date = $request->start_date;
        }else{
            $start_date =  Carbon::now()->startOfMonth();
        }

        if ($request->end_date){
            $end_date = $request->end_date;
        }else{
            $end_date =  Carbon::now()->endOfMonth();
        }
        
        $allowedfilters =[
            AllowedFilter::exact('employee_id')
        ];

        if (Auth::user()->hasRole('Super-Admin')){
            $attendances = QueryBuilder::for(Attendance::with('employee'))
            ->join('duties','duties.id','attendances.duty_id')
            ->defaultSort('-duties.date')
            ->allowedFilters($allowedfilters)
            ->whereBetween('duties.date', [$start_date,$end_date])
            ->paginate(10)
            ->appends(request()->query());
        }elseif(Auth::user()->can('read all attendance')){
            $attendances = QueryBuilder::for(Attendance::with('employee'))
            ->join('duties','duties.id','attendances.duty_id')
            ->defaultSort('-duties.date')
            ->allowedFilters($allowedfilters)
            ->paginate(10)
            ->appends(request()->query());
        }elseif(Auth::user()->employee == null){
            $attendances =[];
        }elseif(Auth::user()->can('read attendance')){
            $attendances = Attendance::with('employee')->where('employee_id',Auth::user()->employee->id)->paginate(10);
        }
        
        $request->flash();
        
        return view('hrm.attendances.index', compact('attendances','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hrm\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hrm\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceRequest  $request
     * @param  \App\Models\hrm\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hrm\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
