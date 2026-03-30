<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouseStock extends Model
{
    protected $fillable = [
        'warehouse_id',
        'quantity',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function fixedAsset()
    {
        return $this->belongsTo(FixedAsset::class, 'fixed_asset_id');
    }

    public function variableAsset()
    {
        return $this->belongsTo(VariableAsset::class, 'variable_asset_id');
    }

    public function engineerRequestItems()
    {
        return $this->hasMany(EngineerAssetRequestItems::class, 'asset_id');
    }

}
