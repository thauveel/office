<?php

namespace App\Models\Hrm;

use App\Models\Hrm\Job;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'name', 'alias','email', 'worksite_id'
    ];

    public function job()
    {
        return $this->hasMany(Job::class);
    }

    public function worksite()
    {
        return $this->belongsTo(WorkSite::class,'worksite_id','uuid');
    }

}
