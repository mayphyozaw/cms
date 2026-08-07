<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMeasurements extends Model
{
    protected $fillable = [
        'project_id',
        'measurement_no',
        'measurement_date',
        'status',
        'remarks',
        'created_by',
        'approved_by',
        'approved_at',
    ];


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function siteMeasurementdetails()
    {
        return $this->hasMany(SiteMeasurementDetails::class, 'site_measurement_id','id');
    }
}
