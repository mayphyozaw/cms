<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MixRatioTemplates extends Model
{
    protected $fillable = [
        'code',
        'ratio_name',
        'ratio_type',
        'dry_volume_factor',
        'description',
        'status',
    ];

    public function details()
    {
        return $this->hasMany(MixRatioDetails::class,'mix_ratio_template_id', 'id');
    }
}
