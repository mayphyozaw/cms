<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drawings extends Model
{
    protected $fillable = [
        'project_id',
        'drawing_type_id',
        'drawing_name',
        'drawing_code',
        'revision_no',
        'scale_ratio',
        'remark',
        'drawing_file'
    ];
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
    public function drawingType()
    {
        return $this->belongsTo(DrawingTypes::class, 'drawing_type_id');
    }
}
