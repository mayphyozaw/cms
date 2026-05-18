<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementCategories extends Model
{
    protected $fillable = [
        'category_name',
        'formula_types',
        'symbol',
        'unit',
    ];

    
}
