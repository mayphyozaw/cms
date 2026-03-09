<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngineerAssetRequestItems extends Model
{
    protected $fillable = [
        'id',
        'asset_request_id',
        'asset_id',
        'quantity',
        'require_date',
        'remark',
    ];

    public function engineerAssetRequest()
    {
        return $this->belongsTo(EngineerAssetRequests::class, 'asset_request_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
