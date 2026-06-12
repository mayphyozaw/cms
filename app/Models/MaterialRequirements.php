<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequirements extends Model
{
    protected $fillable = [
        'drawing_measurement_id',
        'material_mapping_id',
        'variable_asset_id',
        'raw_quantity',
        'base_quantity',
        'final_quantity',
        'unit',
        'status',
        'remark'
    ];

    public function drawingmeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class,'drawing_measurement_id');
    }

    public function materialMapping()
    {
        return $this->belongsTo(MaterialMappings::class, 'material_mapping_id');
    }

    public function material()
    {
        return $this->belongsTo(VariableAsset::class,'variable_asset_id');
    }

    public function category()
    {
        return $this->belongsTo(MeasurementCategories::class,'measurement_category_id');
    }
}
