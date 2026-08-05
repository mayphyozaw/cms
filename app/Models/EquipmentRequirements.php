<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentRequirements extends Model
{
    protected $fillable = [
        'drawing_measurement_id',
        'equipment_mapping_id',
        'equipment_id',
        'measurement_qty',
        'productivity',
        'productivity_unit',
        'required_qty',
        'status',
        'remark'
    ];

    public function drawingmeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class, 'drawing_measurement_id');
    }

    public function equipmentMapping()
    {
        return $this->belongsTo(EquipmentMappings::class, 'equipment_mapping_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }


    public function getRequiredUnitAttribute()
    {
        return explode('/', $this->productivity_unit)[1] ?? '';
    }

    
}
