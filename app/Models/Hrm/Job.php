<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;
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

    public function worksite() 
    {
        return $this->hasOneThrough(Department::class, WorkSite::class);
    }
}
