<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoqSection extends Model
{

    protected $fillable = [
        ''
    ];
    public function boqQuantityDetails()
    {
        return $this->hasMany(BoqQuantityDetails::class, 'section_id');
    }
}
