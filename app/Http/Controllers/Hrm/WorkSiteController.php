<?php

namespace App\Http\Controllers\Hrm;

use App\Models\Hrm\WorkSite;
use Illuminate\Http\Request;
use App\Concerns\FilterMultiFields;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Hrm\StoreWorkSiteRequest;
use App\Http\Requests\Hrm\UpdateWorkSiteRequest;
use App\Models\Hrm\Employee;

class WorkSiteController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(WorkSite::class, 'worksite');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fields= ['name','alias','email'];
        
        $allowedfilters =[
            AllowedFilter::custom('query', new FilterMultiFields($fields))
        ];

        $worksites = QueryBuilder::for(WorkSite::class)
        ->defaultSort('-created_at')
        ->allowedFilters($allowedfilters)
        ->paginate(10)
        ->appends(request()->query());
        $request->flash();

        //dd($worksites);
        
        return view('hrm.worksites.index', compact('worksites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrm.worksites.create')->withworksite(New WorkSite())
                                            ->withEmployees(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkSiteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkSiteRequest $request)
    {
        $data = $request->validated();

        $department = WorkSite::create($data);
        return redirect()->route('hrm.worksites.index')->withSuccess('Work Site created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm\WorkSite  $worksite
     * @return \Illuminate\Http\Response
     */
    public function show(WorkSite $worksite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm\WorkSite  $worksite
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkSite $worksite)
    {
        return view('hrm.worksites.edit')->withworksite($worksite)
                            ->withemployees(Employee::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkSiteRequest  $request
     * @param  \App\Models\Hrm\WorkSite  $worksite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkSiteRequest $request, WorkSite $worksite)
    {
        $data = $request->validated();

        $worksite->update($data);
        return redirect()->route('hrm.worksites.index')->withSuccess('Work Site updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm\WorkSite  $worksite
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkSite $worksite)
    {
        //
    }
}
