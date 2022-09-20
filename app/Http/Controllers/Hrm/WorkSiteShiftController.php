<?php

namespace App\Http\Controllers\Hrm;

use Carbon\Carbon;
use App\Models\hrm\Shift;
use App\Models\Hrm\WorkSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Hrm\StoreShiftRequest;
use App\Http\Requests\Hrm\UpdateShiftRequest;

class WorkSiteShiftController extends Controller
{
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
        return redirect()->route('hrm.worksites.shifts.index', compact('worksite','shift'))->withSuccess('Shift updated successfully.');
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
