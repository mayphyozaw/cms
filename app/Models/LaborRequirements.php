<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborRequirements extends Model
{

    protected $fillable = [
        'drawing_measurement_id',
        'labor_mapping_id',
        'labor_type_id',
        'raw_quantity',
        'required_qty',
        'required_unit',
        'status',
        'remark'
    ];

    public function drawingmeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class,'drawing_measurement_id');
    }

    public function laborMapping()
    {
        return $this->belongsTo(LaborMappings::class, 'labor_mapping_id');
    }

    public function laborType()
    {
        return $this->belongsTo(LaborType::class, 'labor_type_id');
    }

    

    
}
