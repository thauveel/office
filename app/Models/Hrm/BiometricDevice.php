<?php

namespace App\Models\hrm;

use App\Models\BaseModel;
use App\Models\Hrm\WorkSite;

class BiometricDevice extends BaseModel
{
    protected $fillable = [
        'name', 'ip', 'serialNumber',
        'work_site_id'
    ];

    public function workSite()
    {
        return $this->belongsTo(WorkSite::class);
    }

    public function attendanceLogs()
    {
        return $this->hasMany(WorkSite::class);
    }
}
