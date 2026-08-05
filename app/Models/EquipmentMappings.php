<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentMappings extends Model
{
    protected $fillable = [
        'drawing_measurement_id',
        'equipment_id',
        'equipment_category_id',
        'productivity',
        'productivity_unit',
        'remark',
    ];

    public function drawingmeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class, 'drawing_measurement_id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
    public function equipmentCategory()
    {
        return $this->belongsTo(EquipmentCategory::class, 'equipment_category_id');
    }
}
