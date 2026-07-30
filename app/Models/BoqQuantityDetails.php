<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoqQuantityDetails extends Model
{
    protected $fillable = [
        'boq_id',
        'section_id',
        'type',
        'item_no',
        'title',
        'drawing_measurement_id',
        'unit',
        'quantity',
        'remark'
        
    ];

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

    public function section()
    {
        return $this->belongsTo(BoqQuantityDetails::class, 'section_id');
    }
    public function items()
    {
        return $this->hasMany(BoqQuantityDetails::class, 'section_id')
            ->where('type', 'item');
    }

    public function boq()
    {
        return $this->belongsTo(Boq::class,'boq_id');
    }
    
}
