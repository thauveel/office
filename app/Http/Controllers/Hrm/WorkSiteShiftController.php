<?php

namespace App\Http\Controllers\Hrm;

use App\Models\hrm\Shift;
use App\Models\Hrm\WorkSite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

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
        $shifts = QueryBuilder::for(Shift::where('wrok_site_id',$worksite->uuid))
        ->defaultSort('created_at')
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShiftRequest  $request
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(WorkSite $worksite, UpdateShiftRequest $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hrm\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkSite $worksite, Shift $shift)
    {
        //
    }
}
