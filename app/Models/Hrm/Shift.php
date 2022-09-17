<?php

namespace App\Models\hrm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{

    public const STATUS = [
        'scheduled' => 'scheduled',
        'present' => 'present',
        'completed' => 'completed',
        'absent' => 'absent',
        'released' => 'released',
        'on_trip' => 'on_trip'
    ];

    public const DAYS = [
        'sunday' => 'sunday',
        'monday' => 'monday',
        'tuesday' => 'tuesday',
        'wednesday' => 'wednesday',
        'thursday' => 'thursday',
        'friday' => 'friday',
        'saturday' => 'saturday'

    ];

    protected $dateFormat = 'Y-m-d';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'date', 'type','status', 'leave_id', 'check_in_start',
        'check_in_end', 'checked_in_at', 'break_start',
        'break_end', 'break_allowed_duration', 'checkout_start',
        'checkout_end', 'checked_out_at', 'shift_total', 'total_worked',
        'total_late', 'work_day_count', 'employee_id'
    ];

    public function employee() 
    {
        return $this->belongsTo(Employee::class,'employee_id','uuid');
    }
}
