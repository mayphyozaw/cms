<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MixRatioDetails extends Model
{
    protected $fillable = [
        'mix_ratio_template_id',
        'variable_asset_id',
        'part',
        'total_part',
        'consumption_ratio'
    ];


    public function mixRatio()
    {
        return $this->belongsTo(MixRatioTemplates::class,'mix_ratio_template_id');
    }

    public function material()
    {
        return $this->belongsTo(VariableAsset::class,'variable_asset_id');
    }
}
