<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoqCostDetails extends Model
{
    protected $fillable = [
        'boq_id',
        'boq_quantity_detail_id',
        'section_id',
        'type',
        'item_no',
        'title',
        'boq_category_id',
        'requirement_id',
        'quantity',
        'unit',
        'unit_rate',
        'amount',
        'remark'

    ];
    public function section()
    {
        return $this->belongsTo(BoqCostDetails::class, 'section_id');
    }
    // public function items()
    // {
    //     return $this->hasMany(BoqQuantityDetails::class, 'section_id')
    //         ->where('type', 'item');
    // }
    public function boqCategory()
    {
        return $this->belongsTo(BoqCategories::class, 'boq_category_id');
    }

    public function quantityDetail()
    {
        return $this->belongsTo(BoqQuantityDetails::class,'boq_quantity_detail_id');
    }


    public function materialRequirement()
    {
        return $this->belongsTo(MaterialRequirements::class,'requirement_id');
    }

    public function material()
    {
        return $this->belongsTo(VariableAsset::class,'variable_asset_id');
    }

    public function boq()
    {
        return $this->belongsTo(Boq::class,'boq_id');
    }

    public function laborRequirement()
    {
        return $this->belongsTo(MaterialRequirements::class,'requirement_id');
    }

    public function equipmentRequirement()
    {
        return $this->belongsTo(MaterialRequirements::class,'requirement_id');
    }
}
