<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $fillable = [
        ''
    ];
    public function quotationProposalItems()
    {
        return $this->hasMany(QuotationProposalItems::class, 'section_id');
    }
}
