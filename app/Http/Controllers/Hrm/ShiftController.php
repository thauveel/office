<?php

namespace App\Http\Controllers\Hrm;

use App\Models\hrm\Shift;
use App\Http\Requests\Hrm\StoreShiftRequest;
use App\Http\Requests\Hrm\UpdateShiftRequest;
use Illuminate\Http\Request;
use App\Concerns\FilterMultiFields;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ShiftController extends Controller
{
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
            AllowedFilter::exact('employee', 'employee.uuid'),
            AllowedFilter::exact('status')
        ];
        $shifts = QueryBuilder::for(Shift::class)
        ->join('employees','employees.uuid','shifts.employee_id')
        ->allowedFilters($allowedfilters)
        ->select('shifts.*')
        ->paginate(10)
        ->appends(request()->query());;
        $request->flash();
        
        return view('hrm.shifts.index',compact('shifts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('hrm.shifts.create')->withShift(new Shift());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShiftRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShiftRequest  $request
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
