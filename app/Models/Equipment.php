<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'equipment_code',
        'name',
        'equipment_category_id',
        'boq_category_id',
        'brand',
        'model',
        'serial_no',
        'capacity_spec',
        'rate_unit',
        'ownership_type',
        'purchase_date',
        'status',
        'remarks',
        
    ];

    public function boqCategory()
    {
        return $this->belongsTo(BoqCategories::class, 'boq_category_id');
    }

    public function equipmentCategory()
    {
        return $this->belongsTo(EquipmentCategory::class, 'equipment_category_id');
    }

    public function equipmentRate()
    {
        return $this->hasMany(EquipmentRate::class);
    }

}
