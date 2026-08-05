<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariableAsset extends Model
{
    protected $fillable = [
        'name',
        'material_code',
        'variable_category_id',
        'boq_category_id',
        'unit',
        'quantity',
        'remarks',
    ];

    public function variableCategory()
    {
        return $this->belongsTo(VariableCategory::class, 'variable_category_id');
    }

    public function boqCategory()
    {
        return $this->belongsTo(BoqCategories::class, 'boq_category_id');
    }
    public function fixedAsset()
    {
        return $this->belongsTo(FixedAsset::class, 'fixed_asset_id');
    }

    public function materialRate()
    {
        return $this->hasMany(MaterialRate::class);
    }

    public function latestRate()
    {
        return $this->hasOne(MaterialRate::class)
            ->latestOfMany('effective_date');
    }

    public function requirement()
{
    return $this->belongsTo(MaterialRequirements::class, 'requirement_id');
}
}
