<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationProposal extends Model
{
    protected $fillable = [
        'main_subject',
        'proposal_date',
        'proposalInvoice_no',
        'workscope_id',
        'status',
        'client_id',
        'project_id',
        'project_code',
        'subtotal_amount',
        'tax_amount',
        'discount',
        'total_amount',
        'due_amount',
        'notes',
        'term_notes',
    ];

    public function quotationProposalItems()
    {
        return $this->hasMany(QuotationProposalItems::class, 'quotation_proposal_id');
    }

    public function workScope()
    {
        return $this->belongsTo(WorkScope::class, 'workscope_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // public function sections()
    // {
    //     return $this->hasMany(QuotationProposalItems::class, 'quotation_proposal_id')
    //         ->where('type', 'section')
    //         ->whereNull('section_id');
    // }

    public function sections()
    {
        return $this->hasMany(QuotationProposalItems::class, 'quotation_proposal_id')
            ->where('type', 'section');
    }

    public function paymentTerms()
{
    return $this->hasMany(PaymentTerms::class, 'quotation_proposal_id');
}
}
