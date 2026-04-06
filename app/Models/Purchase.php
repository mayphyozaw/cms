<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'purchase_date',
        'purchase_no',
        'invoice_no',
        'warehouse_id',
        'supplier_id',
        'subtotal_amount',
        'tax_amount',
        'discount',
        'shipping',
        'status',
        'remark',
        'total_amount',
        'paid_amount',
        'due_amount',
        'payment_status',
    ];

    protected $casts = [
        'purchase_date' => 'datetime:Y-m-d H:i:s',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
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

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayments::class);
    }

    public function warehouseStock()
    {
        return $this->belongsTo(WareHouseStock::class, 'warehouse_stock_id');
    }

    
    
}
