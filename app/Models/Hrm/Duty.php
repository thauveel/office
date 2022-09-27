<?php

namespace App\Models\hrm;

use App\Models\BaseModel;
use App\Models\Hrm\Employee;
use App\Models\Hrm\WorkSite;

class Duty extends BaseModel
{
    protected $fillable = [
        'date', 'color', 'check_in_start','check_in_end',
        'break_start', 'break_end', 'break_allowed_duration',
        'check_out_start','check_out_end', 
        'shift_id', 'employee_id'
    ];

    protected $casts = [
        'date' => 'date:d-m-Y',
        'check_in_start' => 'datetime:H:i',
        'check_in_end' => 'datetime:H:i',
        'break_start' => 'datetime:H:i',
        'break_end' => 'datetime:H:i',
        'break_allowed_duration' => 'datetime:H:i',
        'check_out_start' => 'datetime:H:i',
        'check_out_end' => 'datetime:H:i',
    ];



    public function worksite()
    {
        return $this->hasOneThrough(
            WorkSite::class,
            Shift::class,
            'work_site_id', // Foreign key on the environments table...
            'shift_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
