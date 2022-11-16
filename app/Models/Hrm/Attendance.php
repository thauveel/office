<?php

namespace App\Models\hrm;

use App\Models\BaseModel;

class Attendance extends BaseModel
{
    protected $fillable = [
        'check_in_at', 'check_out_at', 'status',
        'total_late', 'break_late',  
        'duty_id', 'employee_id'
    ];

    protected $casts = [
        'check_in_at' => 'datetime:H:i',
        'check_out_at' => 'datetime:H:i',
        'total_late' => 'datetime:H:i',
        'break_late' => 'datetime:H:i'
    ];

    public function duty()
    {
        return $this->belongsTo(Duty::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function attendancelogs()
    {
        return $this->hasMany(AttendanceLog::class);
    }
}
