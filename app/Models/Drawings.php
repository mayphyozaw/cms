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
    ];
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
