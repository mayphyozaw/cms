<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborType extends Model
{
    protected $fillable = [
        'name',
        'unit',
        
    ];

    public function laborRate()
    {
        return $this->hasMany(LaborRate::class);
    }
}
