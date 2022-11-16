<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;

class Department extends BaseModel
{

    protected $fillable = [
        'name', 'alias','email', 'work_site_id'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function workSite()
    {
        return $this->belongsTo(WorkSite::class);
    }

}
