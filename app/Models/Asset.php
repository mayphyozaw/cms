<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    
    protected $fillable = [
    'asset_type',
    'name',
    'category_id',
    'warehouse_id',
    'unit',
    'quantity',
    'status',
    'remarks',
];


    public function category()
    {
        return $this->belongsTo(FixedAssetCategory::class, 'category_id');
    }


    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function fixedAsset()
    {
        return $this->belongsTo(FixedAsset::class, 'id');
    }
    public function variableAsset()
    {
        return $this->belongsTo(VariableAsset::class, 'id');
    }
    public function getAssetNameAttribute()
    {
        if ($this->asset_type == 'fixedAsset') {
            return optional($this->fixedAsset)->name;
        }

        return optional($this->variableAsset)->name;
    }
}
