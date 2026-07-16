<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborRate extends Model
{
    protected $fillable = [
        'labor_type_id',
        'rate',
        'effective_date',
        'remark',
        'status',
        
    ];

    public function laborType()
    {
        return $this->belongsTo(LaborType::class,'labor_type_id');
    }
}
