<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = [
        'purchase_id',
        'asset_id',
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
}
