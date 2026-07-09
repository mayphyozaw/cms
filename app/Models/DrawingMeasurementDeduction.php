<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingMeasurementDeduction extends Model
{
    protected $fillable = [
        'drawing_measurement_detail_id',
        'opening_type',
        'description',
        'length',
        'width',
        'height',
        'nos',
        'area',
        'remarks',
    ];

    //Opening_type => DOOR, WINDOW, VENTILATOR, OPENING, OTHER


    public function drawingMeasurementDetail()
    {
        return $this->belongsTo(DrawingMeasurementDetail::class);
    }
}
