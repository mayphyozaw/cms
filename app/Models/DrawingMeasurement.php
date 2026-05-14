<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingMeasurement extends Model
{

    protected $fillable = [
        'project_id',
        'drawing_id',
        'work_type_id',
        'length',
        'width',
        'height',
        'coats',
        'qty',
        'unit_weight',
        'quantity',
        'unit',
        'remark',
    ];

    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function drawing()
    {
        return $this->belongsTo(Drawings::class);
    }
    public function measurementType()
    {
        return $this->belongsTo(MeasurementTypes::class,'measurement_type_id');
    }
}
