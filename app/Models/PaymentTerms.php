<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTerms extends Model
{
    protected $fillable = [
        'quotation_proposal_id',
        'name',
        'percentage',
        'amount',
        'description',
        'order_no',
        'payer',
        'receiver',
        'date',
    ];

    public function quotationProposal()
    {
        return $this->belongsTo(QuotationProposal::class, 'quotation_proposal_id');
    }

    public function getAmountAttribute()
    {
        if (!$this->quotationProposal) {
            return 0;
        }

        return ($this->quotationProposal->total_amount / 100) * $this->percentage;
    }

    public function paymentTerms()
{
    return $this->hasMany(PaymentTerms::class, 'quotation_proposal_id');
}
}
