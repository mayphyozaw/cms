<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariableAsset extends Model
{
    protected $fillable = [
    'name',
    'material_code',
    'variable_category_id',
    'unit',
    'quantity',
    'remarks',
];

    public function variableCategory()
    {
        return $this->belongsTo(VariableCategory::class, 'variable_category_id');
    }
    public function fixedAsset()
    {
        return $this->belongsTo(FixedAsset::class, 'fixed_asset_id');
    }
}
