<?php

namespace App\Http\Controllers\Hrm;

use Illuminate\Http\Request;
use App\Models\Hrm\Department;
use App\Concerns\FilterMultiFields;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Hrm\StoreDepartmentRequest;
use App\Http\Requests\Hrm\UpdateDepartmentRequest;
use App\Models\Hrm\WorkSite;

class DepartmentController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Department::class, 'department');
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

        $departments = QueryBuilder::for(Department::with('worksite'))
        ->defaultSort('-created_at','work_site_id')
        ->allowedFilters($allowedfilters)
        ->paginate(10)
        ->appends(request()->query());
        $request->flash();
        
        return view('hrm.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $worksites = WorkSite::all();
        return view('hrm.departments.create', compact('worksites'))->withDepartment(new Department());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Hrm\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $data = $request->validated();

        $department = Department::create($data);
        return redirect()->route('hrm.departments.index')->withSuccess('Department created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $worksites = WorkSite::all();
        return view('hrm.departments.edit', compact('worksites', 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Hrm\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $data = $request->validated();

        $department->update($data);
        return redirect()->route('hrm.departments.index')->withSuccess('Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('hrm.departments.index')->withSuccess('Department deleted successfully.');
    }
}
