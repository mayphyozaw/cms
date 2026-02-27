<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngineerRequest extends Model
{
    protected $fillable = [
            'id',
            'request_code',
            'request_date',
            'project_id',
            'workscope_id',
            'warehouse_id',
            'engineer_assign_id',
            'asset_type',
            'status',
            'approved_by',
            'remark',
    ];

    public function engineerRequestItem()
    {
        return $this->hasMany(EngineerRequestItem::class, 'request_id');
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
    
    public function engieerAssign()
    {
        return $this->belongsTo(EngineerAssign::class, 'engineer_assign_id');
    }
}
