<?php

namespace App\Http\Controllers\Backend\ClientManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuotationProposals\QuotationProposalStoreRequest;
use App\Models\Client;
use App\Models\ProjectCategory;
use App\Models\QuotationProposal;
use App\Models\QuotationProposalItems;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class QuotationProposalController extends Controller
{
    public function index()
    {

        $proposalAllData = QuotationProposal::with(['sections.items','client','workscope'])->get();
        
        return view('admin.backend.clientmanage.quotation-proposal.index',compact('proposalAllData'));
    }

    public function create()
    {
        $clients = Client::all();
        // $project_categories = ProjectCategory::all();
        $workscopes = WorkScope::all();
        return view('admin.backend.clientmanage.quotation-proposal.create', compact('clients', 'workscopes'));
    }

    public function store(Request $request)
    {

        $lastProposal = QuotationProposal::latest()->first();
        $nextNumber = $lastProposal ? $lastProposal->id + 1 : 1;
        $proposalInvoiceNo = '#QP' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        $total_amount = 0;
        $subtotal_amount = 0;
        $due_amount = 0;

        $quotationProposal = QuotationProposal::create([
            'main_subject' => $request->main_subject,
            'proposal_date' => $request->proposal_date,
            'proposalInvoice_no' => $proposalInvoiceNo,
            'workscope_id' => $request->workscope_id,
            'client_id' => $request->client_id,
            'project_id' => $request->project_id ?? 0,
            'tax_amount' => $request->tax_amount ?? 0,
            'discount' => $request->purchase_discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'status' => $request->status,
            'remark' => $request->remark ?? '',
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

                $itemTotal = ($row['qty'] ?? 0) * ($row['price'] ?? 0);
                $subtotal_amount += $itemTotal;

                QuotationProposalItems::create([
                    'quotation_proposal_id' => $quotationProposal->id,
                    'type' => 'item',
                    'section_id' => $sectionId,
                    'item_no' => $row['item_no'],
                    'title' => $row['title'],
                    'unit' => $row['unit'],
                    'quantity' => $row['quantity'],
                    'price' => $row['price'],
                    'total_amount' => $row['quantity'] * $row['price'],
                    'remark' => $row['remark'],
                ]);
            }
        }

        $taxPercent = $request->tax_amount ?? 0;
        $taxAmount = ($subtotal_amount * $taxPercent) / 100;

        $globalDiscount = $request->purchase_discount ?? 0;

        $total_amount = $subtotal_amount + $taxAmount - $globalDiscount;

        $quotationProposal->update([
            'subtotal_amount' => $subtotal_amount,
            'tax_amount' => $taxAmount,
            'total_amount' => $total_amount,
        ]);


        return redirect()->route('clientmanage.quototation-proposal.index')->with([
            'message' => 'Proposal Stored successfully!',
            'alert-type' => 'success'
        ]);
    }
}
