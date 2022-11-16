<?php

namespace App\Http\Controllers\Hrm;

use Carbon\Carbon;
use App\Models\Hrm\Job;
use App\Models\hrm\Duty;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;
use App\Models\Hrm\WorkSite;
use Illuminate\Http\Request;
use App\Models\Hrm\Department;
use App\Concerns\FilterMultiFields;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Hrm\StoreDutyRequest;
use App\Http\Requests\Hrm\UpdateDutyRequest;

class DutyController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Duty::class, 'duty');
    }

   /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allowedfilters =[
            AllowedFilter::exact('date'),
            AllowedFilter::exact('employee_id'),
        ];
        
        $duties = QueryBuilder::for(Duty::with('employee'))
        ->allowedFilters($allowedfilters)
        ->join('shifts','shifts.id','shift_id')
        ->select('duties.*')
        ->defaultSort('-date','employee_id')
        ->paginate(10)
        ->appends(request()->query());
        $request->flash();
    
        return view('hrm.duties.index',compact('duties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WorkSite $worksite)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDutyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDutyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hrm\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function show(Duty $duty)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hrm\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function edit(Duty $duty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDutyRequest  $request
     * @param  \App\Models\hrm\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDutyRequest $request, Duty $duty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hrm\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duty $duty)
    {
        $duty->attendance()->delete();
        $duty->delete();
        return redirect()->route('hrm.duties.index')->withSuccess('Duty deleted successfully.');
    }
}
