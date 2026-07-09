<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingMeasurementDetail extends Model
{
    protected $fillable = [
        'drawing_measurement_id',
        'description',
        'formula_type',
        'nos',
        'length',
        'width',
        'height',
        'deduction',
        'gross_quantity',
        'net_quantity',
        'unit',
    ];
    

    // formula_type => AREA, VOLUME, LINEAR, COUNT, WEIGHT

    //     Description	            Formula Type
    //      Brick Wall	                AREA
    //      Painting	                AREA
    //      Excavation	                VOLUME
    //      RCC Footing	                VOLUME
    //      Rebar	                    WEIGHT
    //      Fence	                    LINEAR
    //      Door Installation	        COUNT


    public function drawingMeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class,'drawing_measurement_id');
    }


    public function deductions()
    {
        return $this->hasMany(DrawingMeasurementDeduction::class);
    }
}
