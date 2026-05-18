<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMeasurements extends Model
{
    protected $fillable = [
        'project_id',
        'drawing_id',
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

    public function measurementCategory()
    {
        return $this->belongsTo(MeasurementCategories::class, 'category_id');
    }

    public function drawing()
    {
        return $this->belongsTo(Drawings::class);
    }
}
