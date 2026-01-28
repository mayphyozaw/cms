<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    protected $fillable = [
        'project_id',
        'category_id',
        'status',
    ];
}
