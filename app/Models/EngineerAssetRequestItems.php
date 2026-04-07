<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngineerAssetRequestItems extends Model
{
    protected $fillable = [
        'asset_request_id',
        'asset_id',
        'quantity',
        'require_date',
        'transfer_from_warehouse_id',
        'transfer_from_project_id',
        'sent_date',
        'remark',
        'passed_qty',
        'checked_by',
        'checked_at'
    ];

    public function engineerAssetRequest()
    {
        return $this->belongsTo(EngineerAssetRequests::class, 'asset_request_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'transfer_from_warehouse_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'transfer_from_project_id');
    }
}
