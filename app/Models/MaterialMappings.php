<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialMappings extends Model
{
    protected $fillable = [
        'measurement_category_id',
        'drawing_measurement_id',
        'mix_ratio_template_id',
        'consumption_type',
        'coverage_qty',
        'percentage',
        'consumption_ratio',
        'variable_asset_id',
        'wastage_percentage',
        'status',
        'remark'
    ];

    public function category()
    {
        return $this->belongsTo(MeasurementCategories::class,'measurement_category_id');
    }

    public function drawingmeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class, 'drawing_measurement_id');
    }

    public function mixRatio()
    {
        return $this->belongsTo(MixRatioTemplates::class,'mix_ratio_template_id');
    }

    public function material()
    {
        return $this->belongsTo(VariableAsset::class,'variable_asset_id');
    }

    
    
}
