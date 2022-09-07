<?php

namespace App\Models\Hrm;

use App\Traits\HasUuid;
use App\Models\Hrm\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'name', 'department_id', 'code'
    ];

    public function department() 
    {
        return $this->belongsTo(Department::class,'department_id','uuid');
    }
}
