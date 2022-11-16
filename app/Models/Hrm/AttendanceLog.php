<?php

namespace App\Models\hrm;

use App\Models\BaseModel;

class AttendanceLog extends BaseModel
{
    protected $fillable = [
        'uid', 'time', 'state',
        'type', 'date','staff_id',
        'attendance_id', 'employee_id','biometric_device_id'
    ];

    protected $casts = [
        'time' => 'datetime:H:i'
    ];

    public const type =[
        0 => 'Checkin',
        1 => 'Checkout',
        4 => 'Overtimein',
        5 => 'Overtimeout'
    ];

    public const state =[
        0 => 'Manual',
        1 => 'Finger',
        4 => 'Card',
        25 => 'Palm'
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    public function biometricDevice()
    {
        return $this->belongsTo(BiometricDevice::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
