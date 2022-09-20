<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;
use App\Models\hrm\Shift;
use App\Models\Hrm\Department;

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

    // public function worksite() 
    // {
    //     return $this->hasOneThrough(
    //         WorkSite::class, 
    //         Department::class
    //     );
    // }
}
