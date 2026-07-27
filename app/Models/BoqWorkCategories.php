<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoqWorkCategories extends Model
{
    protected $fillable = [
        'work_scope_id',
        'boq_work_types',
        'category_name'
    ];

     protected $table = 'boq_work_categories';

    public function workScope()
    {
        return $this->belongsTo(WorkScope::class,'work_scope_id');
    }
}
