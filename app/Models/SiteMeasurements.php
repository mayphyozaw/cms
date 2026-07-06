<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMeasurements extends Model
{
    protected $fillable = [
        'project_id',
        'drawing_id',
        'drawing_measurement_id',
        'category_id',
        'length',
        'width',
        'height',
        'unit_weight',
        'quantity',
        'unit',
        'rate',
        'total',
        'remarks',
    ];

    public function category()
    {
        return $this->belongsTo(MeasurementCategories::class, 'category_id');
    }

    public function drawing()
    {
        return $this->belongsTo(Drawings::class, 'drawing_id');
    }
    
    public function drawingMeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class, 'drawing_measurement_id');
    }
}
