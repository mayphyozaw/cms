<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingMeasurement extends Model
{

    protected $fillable = [
        'project_id',
        'measurement_categories_id',
        'drawing_id',
        'length',
        'width',
        'height',
        'coats',
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
        return $this->belongsTo(Drawings::class, 'drawing_id');
    }
    public function measurementType()
    {
        return $this->belongsTo(MeasurementTypes::class,'measurement_type_id');
    }

    public function measurementCategory()
    {
        return $this->belongsTo(MeasurementCategories::class, 'measurement_categories_id');
    }


}
