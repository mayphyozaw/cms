<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingMeasurement extends Model
{
 
    protected $fillable = [
        'project_id',
        'drawing_id',
        'work_type_id',
        'length',
        'width',
        'height',
        'coats',
        'quantity',
        'remark'
    ];
}
