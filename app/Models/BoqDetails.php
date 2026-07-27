<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoqDetails extends Model
{
    protected $fillable = [
        'boq_id',
        'drawing_measurement_id',
        'measurement_category_id',
        'work_scope_id',
        'boq_work_category_id',
        'work_type',
        'item_name',
        'unit',
        'quantity',
        'remark',
    ];

    // $boq->load([
    //     //     'details.drawingMeasurement.category',
    //     //     'details.workScope',
    //     //     'details.boqWorkCategory',
    //     // ]);


    public function drawingMeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class, 'drawing_measurement_id');
    }
    public function category()
    {
        return $this->belongsTo(MeasurementCategories::class, 'measurement_category_id');
    }
    public function workScope()
    {
        return $this->belongsTo(WorkScope::class, 'work_scope_id');
    }
    public function boqWorkCategory()
    {
        return $this->belongsTo(BoqWorkCategories::class, 'boq_work_category_id');
    }
}
