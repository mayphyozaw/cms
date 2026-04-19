<?php

namespace App\Http\Controllers\Backend\ClientManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuotationProposals\QuotationProposalStoreRequest;
use App\Models\Client;
use App\Models\PaymentTerms;
use App\Models\ProjectCategory;
use App\Models\QuotationProposal;
use App\Models\QuotationProposalItems;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class QuotationProposalController extends Controller
{
    public function index()
    {

        $proposalAllData = QuotationProposal::with(['sections.items', 'client', 'workscope'])->get();

        return view('admin.backend.clientmanage.quotation-proposal.index', compact('proposalAllData'));
    }

    public function create()
    {
        $clients = Client::all();
        $workscopes = WorkScope::all();
        // $terms = QuotationProposal::with('paymentTerms')->orderBy('order_no')->get();
        return view('admin.backend.clientmanage.quotation-proposal.create', compact('clients', 'workscopes'));
    }

    public function store(Request $request)
    {

        $lastProposal = QuotationProposal::latest()->first();
        $nextNumber = $lastProposal ? $lastProposal->id + 1 : 1;
        $proposalInvoiceNo = '#QP' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);



        $quotationProposal = QuotationProposal::create([
            'main_subject' => $request->main_subject,
            'proposal_date' => $request->proposal_date,
            'proposalInvoice_no' => $proposalInvoiceNo,
            'workscope_id' => $request->workscope_id,
            'client_id' => $request->client_id,
            'project_id' => $request->project_id ?? 0,
            'status' => $request->status,
            'notes' => $request->notes ?? '',

        ]);

        $subtotal_amount = 0;

        $sectionId = null;

        foreach ($request->rows as $row) {

            if ($row['type'] == 'section') {

                $section = QuotationProposalItems::create([
                    'quotation_proposal_id' => $quotationProposal->id,
                    'type' => 'section',
                    'item_no' => $row['item_no'],
                    'title' => $row['title'],
                ]);
                $sectionId = $section->id;
            } else {

                if ($row['type'] == 'item' && !$sectionId) {
                    continue;
                }

                $qty = $row['quantity'] ?? 0;
                $price = $row['price'] ?? 0;
                $discount = $row['discount'] ?? 0;

                $itemTotal = ($qty * $price) - $discount;

                $subtotal_amount += $itemTotal;


                QuotationProposalItems::create([
                    'quotation_proposal_id' => $quotationProposal->id,
                    'type' => 'item',
                    'section_id' => $sectionId,
                    'item_no' => $row['item_no'],
                    'title' => $row['title'],
                    'unit' => $row['unit'] ?? '',
                    'quantity' => $qty,
                    'price' => $price,
                    'discount' => $discount,
                    'total_amount' => $itemTotal,
                    'remark' => $row['remark'] ?? '',
                ]);
            }
        }

        $taxPercent = $request->tax_amount ?? 0;
        $taxAmount = ($subtotal_amount * $taxPercent) / 100;

        $globalDiscount = $request->discount ?? 0;

        $grandTotal = ($subtotal_amount + $taxAmount) - $globalDiscount;

        $quotationProposal->update([
            'subtotal_amount' => $subtotal_amount,
            'tax_amount' => $taxAmount,
            'discount' => $globalDiscount,
            'total_amount' => $grandTotal,
            'due_amount' => $grandTotal,
        ]);

        foreach ($request->payment_terms as $index => $term) {
            PaymentTerms::create([
                'quotation_proposal_id' => $quotationProposal->id,
                'percentage' => $term['percentage'],
                'description' => $term['description'],
                'order_no' => $index + 1,
                'amount' => $term['amount'],
                'payer' => $term['payer'],
                'receiver' => $term['receiver'],
                'date' => $term['date'],
            ]);
        }

        return redirect()->route('clientmanage.quototation-proposal.index')->with([
            'message' => 'Proposal Stored successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function detailQuotation($id)
    {
        $proposalData = QuotationProposal::with('sections.items', 'client', 'workscope')->find($id);
        // $terms = QuotationProposal::with('paymentTerms')->orderBy('order_no')->get();
        $proposal = QuotationProposal::with(['paymentTerms' => function ($q) {
            $q->orderBy('order_no');
        }])->findOrFail($id);
        return  view('admin.backend.clientmanage.quotation-proposal.detail', compact('proposalData', 'proposal'));
    }
}
