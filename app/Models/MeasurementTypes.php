<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementTypes extends Model
{
    protected $fillable = [
        'name',
        'symbol',
        'formula',
    ];
}
