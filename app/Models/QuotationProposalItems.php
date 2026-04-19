<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationProposalItems extends Model
{
    protected $fillable = [
        'quotation_proposal_id',
        'section_id',
        'type',
        'item_no',
        'title',
        'unit',
        'price',
        'quantity',
        'price',
        'discount',
        'total_amount',
        'remark',
    ];

    public function quotationPropasal()
    {
        return $this->belongsTo(QuotationProposal::class, 'quotation_proposal_id');
    }
    public function items()
    {
        return $this->hasMany(QuotationProposalItems::class, 'section_id')
            ->where('type', 'item');
    }

    public function section()
    {
        return $this->belongsTo(QuotationProposalItems::class, 'section_id');
    }
}
