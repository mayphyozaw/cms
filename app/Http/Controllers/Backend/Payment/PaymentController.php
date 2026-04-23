<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\FixedAsset;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\PurchasePayments;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payPurchase()
    {

        $purchaseAllData = Purchase::with([
            'user',
            'purchaseItems.asset.fixedAsset'
        ])->get();
        $suppliers = Supplier::all();
        $assets = Asset::all();
        $warehouses = Warehouse::all();
        return view('admin.backend.purchase.payment.purchase_due', compact('purchaseAllData', 'warehouses', 'suppliers', 'assets'));
    }


    public function pay($id)
    {
        $purchaseData = Purchase::with(['purchasePayments', 'purchaseItems.asset.fixedAsset'])->findOrFail($id);
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();

        return view('admin.backend.purchase.payment.pay', compact('purchaseData', 'warehouses', 'suppliers'));
    }


    public function payStore(Request $request, $id)
    {
        $request->validate([
            'pay_now' => 'required|numeric|min:0',
            'payment_date' => 'nullable|date',
            'payment_proof' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        $invocieNo = 'INV / ' . date('Ymd') . '-' . str_pad(3, '0', STR_PAD_LEFT);

        $purchase = Purchase::findOrFail($id);

        $paidAmount = $request->pay_now ?? 0;


        if ($paidAmount > $purchase->due_amount) {
            $paidAmount = $purchase->due_amount;
        }


        $dueAmount = $purchase->due_amount - $paidAmount;

        $totalPaid = ($purchase->paid_amount ?? 0) + $paidAmount;

        if ($dueAmount == 0) {
            $status = 'Paid';
        } elseif ($totalPaid > 0) {
            $status = 'Partial';
        } else {
            $status = 'Unpaid';
        }
        
        $payment_proof_img_name = null;
        if ($request->hasFile('payment_proof')) {
            $payment_proof_img_file = $request->file('payment_proof');
            $payment_proof_img_name = uniqid() . '_' . time() . '.' . $payment_proof_img_file->getClientOriginalExtension();
            $payment_proof_img_file->move(public_path('/upload/payment_proof_images'), $payment_proof_img_name);
        }
        
        PurchasePayments::create([
            'purchase_id' => $purchase->id,
            'invoice_no' => $invocieNo,
            'user_id' => auth()->id(),
            'paid_amount' => $paidAmount,
            'payment_date' => $request->payment_date ?? now(),
            'payment_method' => $request->payment_method ?? '',
            'total_amount' => $purchase->total_amount,
            'due_amount' => $dueAmount,
            'status' => $status,
            'payment_proof' => $payment_proof_img_name,
        ]);


        $purchase->update([
            'paid_amount' => ($purchase->paid_amount ?? 0) + $paidAmount,
            'due_amount' => $dueAmount,
            'status' => $status,
        ]);



        return redirect()
            ->route('payment.purchase_payment', $purchase->id) // make sure route name is correct
            ->with('success', 'Payment successful');
    }

    public function payDetail($id)
    {
        $purchaseData = Purchase::with(['supplier', 'purchasePayments', 'purchaseItems.asset.fixedAsset'])->findOrFail($id);

        return view('admin.backend.purchase.payment.detail', compact('purchaseData'));
    }

    public function invoicePayment($id)
    {
        $purchaseData = Purchase::with(['supplier',  'warehouse', 'purchaseItems.engineerAssetRequests.asset.fixedAsset'])->find($id);
        
        $pdf = Pdf::loadView('admin.backend.purchase.payment.invoice_pdf', compact('purchaseData'));
        return $pdf->download('invoice_' . $id . '.pdf');
    }
}
