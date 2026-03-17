<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'purchase_date',
        'purchase_no',
        'warehouse_id',
        'supplier_id',
        'discount',
        'shipping',
        'status',
        'remark',
        'total_amount',
        'paid_amount',
        'due_amount',
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

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function payments()
{
    return $this->hasMany(PurchasePayments::class);
}
}
