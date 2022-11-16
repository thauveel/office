<?php

namespace App\Models\hrm;

use Carbon\Carbon;
use App\Models\Hrm\Job;
use App\Models\BaseModel;

class Shift extends BaseModel
{
    public const DAYS = [
        'sunday' => 'sunday',
        'monday' => 'monday',
        'tuesday' => 'tuesday',
        'wednesday' => 'wednesday',
        'thursday' => 'thursday',
        'friday' => 'friday',
        'saturday' => 'saturday'
    ];

    // protected $dateFormat = 'H:i';

    protected $fillable = [
        'color', 'check_in_start','check_in_end',
        'break_start', 'break_end', 'break_allowed_duration',
        'check_out_start','check_out_end', 'shift_total', 
        'work_site_id', 'job_id', 'employee_id'
    ];

    protected $casts = [
        'check_in_start' => 'datetime:H:i',
        'check_in_end' => 'datetime:H:i',
        'break_start' => 'datetime:H:i',
        'break_end' => 'datetime:H:i',
        'break_allowed_duration' => 'datetime:H:i',
        'check_out_start' => 'datetime:H:i',
        'check_out_end' => 'datetime:H:i',
        'shift_total' => 'datetime:H:i',
    ];

   /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($shift) {
            $shift->shift_total = Carbon::parse($shift->check_out_start)->diff(Carbon::parse($shift->check_in_end))->format('%H:%I');
        });
    }

    public function employee() 
    {
        return $this->belongsTo(Employee::class,'employee_id','uuid');
    }

    public function job() 
    {
        return $this->belongsTo(Job::class,'employee_id','uuid');
    }

    public function workSite() 
    {
        return $this->belongsTo(WorkSite::class,'employee_id','uuid');
    }
}
