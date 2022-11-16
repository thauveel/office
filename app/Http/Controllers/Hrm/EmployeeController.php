<?php

namespace App\Http\Controllers\Hrm;

use App\Models\Hrm\Employee;
use Illuminate\Http\Request;
use App\Concerns\FilterMultiFields;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Hrm\StoreEmployeeRequest;
use App\Http\Requests\Hrm\UpdateEmployeeRequest;
use App\Models\Hrm\Job;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Employee::class, 'employee');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fields= ['employees.staff_id','employees.name','employees.name_dv','employees.nid','employees.passport','employees.email'];
        
        $allowedfilters =[
            AllowedFilter::custom('query', new FilterMultiFields($fields))
        ];

        $employees = QueryBuilder::for(Employee::with('job.department.worksite'))//need to return only user name and email
        // ->join('jobs','employees.job_id','jobs.uuid')
        // ->join('departments','jobs.department_id','departments.uuid')
        ->defaultSort('employees.name')
        ->allowedFilters($allowedfilters)
        // ->select('employees.*')
        ->paginate(10)
        ->appends(request()->query());
        $request->flash();

        return view('hrm.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        $admin_users = User::where('is_admin', true)->get();
        return view('hrm.employees.create', compact('jobs', 'admin_users'))->withEmployee(new Employee());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        $employee = Employee::create($data);
        return redirect()->route('hrm.employees.index')->withSuccess('Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        
        return view('hrm.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $jobs = Job::all();
        $admin_users = User::where('is_admin', true)->get();
        
        return view('hrm.employees.edit', compact('jobs', 'admin_users', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Hrm\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        $employee->update($data);
        return redirect()->route('hrm.employees.index')->withSuccess('Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
