<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkScope extends Model
{
    protected $table = 'work_scopes';
    
    protected $fillable = [
        'title',
    ];
}
