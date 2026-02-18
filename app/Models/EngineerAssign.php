<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngineerAssign extends Model
{
    protected $fillable = [
        'name',
        'client_id',
        'user_id',
        'project_id',
        'site_location',
        'building_area',
        'storeys',
        'job_scope',
        'construction_type',
        'project_code',

    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
