<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborMappings extends Model
{
    protected $fillable = [
        'drawing_measurement_id',
        'labor_type_id',
        'productivity',
        'unit',
        'remark',
    ];

    public function drawingmeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class, 'drawing_measurement_id');
    }

    public function laborType()
    {
        return $this->belongsTo(LaborType::class, 'labor_type_id');
    }

}
