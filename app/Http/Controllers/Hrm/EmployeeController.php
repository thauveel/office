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

class EmployeeController extends Controller
{
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

        $employees = QueryBuilder::for(Employee::class)
        ->defaultSort('-created_at','staff_id')
        ->allowedFilters($allowedfilters)
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
        return view('hrm.employees.create', compact('jobs'))->withEmployee(new Employee());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
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
        //
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
