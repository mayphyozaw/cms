<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{

    protected $fillable = [
        'asset_type',
        'fixed_asset_id',
        'variable_asset_id',
        'fixed_category_id',
        'variable_category_id',
        'warehouse_id',
        'unit',
        'quantity',
        'total_passed_qty',
        'stock_balance',
        'status',
        'remarks',
    ];

    public function fixedCategory()
    {
        return $this->belongsTo(FixedAssetCategory::class, 'fixed_category_id');
    }

    public function variableCategory()
    {
        return $this->belongsTo(VariableCategory::class, 'variable_category_id');
    }


    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function fixedAsset()
    {
        return $this->belongsTo(FixedAsset::class, 'fixed_asset_id', 'id');
    }

    public function variableAsset()
    {
        return $this->belongsTo(VariableAsset::class, 'variable_asset_id', 'id');
    }

    public function engineerRequestItems()
    {
        return $this->hasMany(EngineerAssetRequestItems::class, 'asset_id');
    }

    public function getAssetNameAttribute()
    {
        if ($this->asset_type == 'fixedAsset') {
            return optional($this->fixedAsset)->name;
        }
        return optional($this->variableAsset)->name;
    }

    public function getCategoryNameAttribute()
    {
        return $this->asset_type === 'fixedAsset'
            ? optional($this->fixedCategory)->category_name
            : optional($this->variableCategory)->variable_category_name;
    }

    public function warehouseStock()
    {
        return $this->hasMany(WareHouseStock::class, 'asset_id','id');
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_id');
    }


    public function updateStockStatus()
    {
        if ($this->stock_balance <= 0) {
            $this->status = 'Out of Stock';
        } elseif ($this->stock_balance <= 10) {
            $this->status = 'Low Stock';
        } else {
            $this->status = 'Available';
        }

        $this->save();

    }
}
