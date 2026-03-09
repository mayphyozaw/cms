<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngineerAssetRequests extends Model
{


    protected $fillable = [
        'request_code',
        'request_date',
        'project_id',
        'workscope_id',
        'user_id',
        'status',
        'remark',
    ];

    protected $casts = [
        'request_date' => 'datetime:Y-m-d H:i:s',
    ];

    public function engineerAssetRequestItems()
    {
        return $this->hasMany(EngineerAssetRequestItems::class, 'asset_request_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function workscope()
    {
        return $this->belongsTo(WorkScope::class, 'workscope_id');
    }
    
}
