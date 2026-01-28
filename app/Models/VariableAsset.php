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
    'total_qty',
    'reorder_level',
    'remarks',
];

    public function category()
    {
        return $this->belongsTo(VariableCategory::class, 'variable_category_id');
    }
}
