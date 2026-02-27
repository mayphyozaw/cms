<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EngineerRequestItem extends Model
{
        protected $fillable = [
            'id',
            'request_id',
            'asset_id',
            'quantity',
            'remark',
        ];

    public function engineerRequest()
    {
        return $this->belongsTo(EngineerRequest::class, 'request_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
