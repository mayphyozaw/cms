<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boq extends Model
{
    protected $fillable = [
        'boq_no',
        'project_id',
        'boq_date',
        'revision_no',
        'prepared_by',
        'prepared_date',
        'approved_by',
        'approved_date',
        'material_total',
        'labor_total',
        'equipment_total',
        'grand_total',
        'status',
        'remarks',

    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function preparedBy()
    {
        return $this->belongsTo(User::class, 'prepared_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
