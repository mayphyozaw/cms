<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FixedAsset extends Model
{
    protected $fillable = [
        'assets_code',
        'name',
        'category_id',
        'warehouse_id',
        'unit',
        'total_qty',
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
}
