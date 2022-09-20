<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;
use App\Models\Hrm\Employee;
use App\Models\Hrm\Department;
use App\Models\hrm\Shift;

class WorkSite extends BaseModel
{
    
    protected $fillable = [
        'code', 'name','employee_id'
    ];

    public function head()
    {
        return $this->belongsTo(Employee::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
}
