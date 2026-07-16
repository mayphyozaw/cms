<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRate extends Model
{
    protected $fillable = [
        'variable_asset_id',
        'rate',
        'effective_date',
        'remark',
        'status',
        
    ];

    public function material()
    {
        return $this->belongsTo(VariableAsset::class,'variable_asset_id');
    }
}
