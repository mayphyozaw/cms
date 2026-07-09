<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingMeasurement extends Model
{

    protected $fillable = [
        'project_id',
        'measurement_categories_id',
        'drawing_id',
        'nos',
        'length',
        'width',
        'height',
        'thickness',
        'thickness_unit',
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
        return $this->belongsTo(MeasurementTypes::class, 'measurement_type_id');
    }

    public function category()
    {
        return $this->belongsTo(MeasurementCategories::class, 'measurement_categories_id');
    }

    public function materialMappings()
    {
        return $this->hasMany(MaterialMappings::class, 'drawing_measurement_id');
    }
    public function details()
    {
        return $this->hasMany(DrawingMeasurementDetail::class);
    }
}
