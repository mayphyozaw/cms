<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingTypes extends Model
{
     protected $fillable = [
        'name',
    ];
    public function drawings()
{
    return $this->hasMany(Drawings::class);
}
}
