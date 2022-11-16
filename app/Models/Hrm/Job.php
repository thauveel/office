<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;

class Job extends BaseModel
{
    protected $fillable = [
        'name', 'department_id', 'code'
    ];

    public function department() 
    {
        return $this->belongsTo(Department::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    // public function worksite() 
    // {
    //     return $this->hasOneThrough(
    //         WorkSite::class, 
    //         Department::class
    //     );
    // }
}
