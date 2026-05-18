<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drawings extends Model
{
    protected $fillable = [
        'project_id',
        'drawing_type_id',
        'drawing_no',
        'drawing_name',
        'revision_no',
        'scale_ratio',
        'remarks',
        'drawing_file',
        'drawing_file_name'
    ];
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }

    public function drawingType()
    {
        return $this->belongsTo(DrawingTypes::class, 'drawing_type_id');
    }

    public function drawingMeasurement()
    {
        return $this->hasMany(DrawingMeasurement::class);
    }
}
