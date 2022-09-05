<?php

namespace App\Models\Hrm;

use App\Traits\HasUuid;
use App\Models\Hrm\Employee;
use App\Models\Hrm\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkSite extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'uuid';

    public $incrementing = false;
    
    protected $fillable = [
        'code', 'name','employee_id'
    ];

    public function head()
    {
        return $this->hasOne(Employee::class,'uuid','employee_id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
