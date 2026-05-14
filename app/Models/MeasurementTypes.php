<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementTypes extends Model
{
    protected $fillable = [
        'name',
        'symbol',
        'formula',
    ];

    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function drawingMeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class);
    }

}
