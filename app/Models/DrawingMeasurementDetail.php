<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingMeasurementDetail extends Model
{
    protected $table = 'drawing_measurement_details';
    
    protected $fillable = [
        'drawing_measurement_id',
        'description',
        'formula_type',
        'nos',
        'length',
        'width',
        'height',
        'thickness',
        'thickness_unit',
        'coats',
        'unit_weight',
        'deduction',
        'gross_quantity',
        'net_quantity',
        'unit',
    ];



    public function drawingMeasurement()
    {
        return $this->belongsTo(DrawingMeasurement::class,'drawing_measurement_id','id');
    }


    public function deductions()
    {
        return $this->hasMany(DrawingMeasurementDeduction::class,'drawing_measurement_detail_id','id');
    }

    
}




    // formula_type => AREA, VOLUME, LINEAR, COUNT, WEIGHT

    //     Description	            Formula Type
    //      Brick Wall	                AREA
    //      Painting	                AREA
    //      Excavation	                VOLUME
    //      RCC Footing	                VOLUME
    //      Rebar	                    WEIGHT
    //      Fence	                    LINEAR
    //      Door Installation	        COUNT