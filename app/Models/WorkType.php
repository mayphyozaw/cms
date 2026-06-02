<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    protected $fillable = [
        'name',
        'measurement_type_id',
        'unit',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function measurementType()
    {
        return $this->belongsTo(MeasurementTypes::class, 'measurement_type_id');
    }

    public function measurementCategory()
    {
        return $this->belongsTo(MeasurementCategories::class, 'category_id');
    }

    
}
