<?php

namespace App\Http\Controllers\Hrm;

use App\Models\Hrm\Job;
use Illuminate\Http\Request;
use App\Models\Hrm\Department;
use App\Concerns\FilterMultiFields;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Hrm\StoreJobRequest;
use App\Http\Requests\Hrm\UpdateJobRequest;

class JobController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Job::class, 'job');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fields= ['jobs.name','departments.name'];
        
        $allowedfilters =[
            AllowedFilter::custom('query', new FilterMultiFields($fields))
        ];

        $jobs = QueryBuilder::for(Job::with('department'))
        ->join('departments','departments.uuid','jobs.department_id')
        ->defaultSort('-created_at')
        ->allowedFilters($allowedfilters)
        ->select('jobs.*')
        ->paginate(10)
        ->appends(request()->query());
        $request->flash();

        return view('hrm.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = new Job();
        $departments = Department::with('worksite')->get();
        return view('hrm.jobs.create', compact('job', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $data = $request->validated();

        $department = Job::create($data);
        return redirect()->route('hrm.jobs.index')->withSuccess('Job created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('hrm.jobs.edit')->withJob($job)
                                    ->withDepartments($departments = Department::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $data = $request->validated();

        $job->update($data);
        return redirect()->route('hrm.jobs.index')->withSuccess('Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('hrm.jobs.index')->withSuccess('Job deleted successfully.');
    }
}
