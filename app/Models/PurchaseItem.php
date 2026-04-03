<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = [
        'purchase_id',
        'asset_request_id',
        'asset_id',
        'asset_type',
        'fixed_asset_id',
        'variable_asset_id',
        'net_unit_cost',
        'quantity',
        'discount',
        'subtotal'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class,'purchase_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
    public function fixedAsset()
    {
        return $this->belongsTo(FixedAsset::class, 'fixed_asset_id', 'id');
    }

    public function variableAsset()
    {
        return $this->belongsTo(VariableAsset::class, 'variable_asset_id', 'id');
    }

    public function engineerAssetRequests()
    {
        return $this->belongsTo(EngineerAssetRequests::class, 'asset_request_id');
    }
}
