<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;

class WorkSite extends BaseModel
{
    
    protected $fillable = [
        'code', 'name','employee_id'
    ];

    public function head()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
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
