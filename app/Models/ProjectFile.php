<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $fillable = [
        'project_id',
        'project_category_id',
        'files',
        'remark',
        'uploaded_at',
        'uploaded_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function project_category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
}
