<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;
use App\Models\Hrm\Job;
use App\Models\Hrm\WorkSite;

class Department extends BaseModel
{

    protected $fillable = [
        'name', 'alias','email', 'work_site_id'
    ];

    public function job()
    {
        return $this->hasMany(Job::class);
    }

    public function worksite()
    {
        return $this->belongsTo(WorkSite::class);
    }

}
