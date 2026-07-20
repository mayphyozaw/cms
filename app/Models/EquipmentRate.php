<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentRate extends Model
{
    protected $fillable = [
        'equipment_id',
        'rate',
        'effective_date',
        'remark',
        'status',
        
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class,'equipment_id');
    }
}
