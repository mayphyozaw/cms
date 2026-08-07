<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMeasurementDetails extends Model
{
    protected $fillable = [
        'site_measurement_id',
        'boq_detail_id',
        'actual_nos',
        'actual_length',
        'actual_width',
        'actual_height',
        'actual_thickness',
        'current_qty',
        'remarks',
    ];

    public function siteMeasurement()
    {
        return $this->belongsTo(SiteMeasurements::class, 'site_measurement_id');
    }

    public function boqDetail()
    {
        return $this->belongsTo(BoqDetails::class, 'boq_detail_id');
    }
}
