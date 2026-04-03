<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarehouseStock extends Model
{
    protected $fillable = [
        'warehouse_id',
        'asset_id',
        'quantity',
        'stock_balance',
        'status',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_id');
    }

    public function updateWarehouseStockStatus()
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
