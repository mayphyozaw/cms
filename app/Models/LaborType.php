<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborType extends Model
{
    protected $fillable = [
        'boq_category_id',
        'name',
        'unit',
        
    ];

    public function laborRate()
    {
        return $this->hasMany(LaborRate::class);
    }
    public function boqCategory()
    {
        return $this->belongsTo(BoqCategories::class, 'boq_category_id');
    }
}
