<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'client_type',
        'client_code',
        'contact_person',
        'project_code',
        'site_location',
        'city',
        'building_area',
        'storeys',
        'construction_type',
        'job_scope',
        'job_package',
    ];
    public function projects()
{
    return $this->hasMany(Project::class);
}
}
