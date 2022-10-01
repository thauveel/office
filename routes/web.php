<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HrmController;


//hrm controllers
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Hrm\JobController;
use App\Http\Controllers\Hrm\DutyController;
use App\Http\Controllers\Hrm\ShiftController;
use App\Http\Controllers\Hrm\EmployeeController;
use App\Http\Controllers\Hrm\WorkSiteController;
use App\Http\Controllers\Hrm\AttendanceController;
use App\Http\Controllers\Hrm\DepartmentController;
use App\Http\Controllers\Hrm\WorkSiteShiftController;

Route::group(['middleware' => 'auth'], function() {

    //portal
    
    Route::get('/', [PortalController::class,'index'])->name('dashboard');

    Route::get('/dashboard', [PortalController::class,'staffdashboard'])->name('staff.dashboard')
    ->middleware('admin');

    Route::get('/recidency', [PortalController::class,'recidency'])->name('portal.recident')
    ->middleware('verified');
  
});

//Staff 
Route::middleware(['auth', 'admin'])->group(function () {
    //ois
    Route::prefix('ois')->group(function () {
        // Route::get('/', [OisController::class,'index'])->name('hrm.dashboard');
        // Route::resource('persons', PersonController::class);
    });
    //hrm
    Route::name('hrm.')->prefix('hrm')->group(function () {
        Route::get('/', [HrmController::class,'index'])->name('dashboard');
        Route::resource('departments', DepartmentController::class);
        Route::resource('jobs', JobController::class);
        Route::resource('worksites', WorkSiteController::class);
        Route::resource('worksites.shifts', ShiftController::class);
        Route::get('/worksites/{worksite}/shifts/{shift}/assign', 
            [ShiftController::class, 'assign'])->name('worksites.shifts.assign');
        Route::post('/worksites/{worksite}/shifts/{shift}/assignto', 
            [ShiftController::class, 'assignto'])->name('worksites.shifts.assignto');
        Route::resource('duties', DutyController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('attendances', AttendanceController::class);
    });
});


require __DIR__.'/auth.php';
