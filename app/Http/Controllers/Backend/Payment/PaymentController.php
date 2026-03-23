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
        $purchaseData = Purchase::with(['purchasePayments','purchaseItems.asset.fixedAsset'])->findOrFail($id);
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        return view('admin.backend.purchase.payment.pay', compact('purchaseData', 'warehouses', 'suppliers'));
    }


    public function payStore(Request $request, $id)
    {
        $request->validate([
            'pay_now' => 'required|numeric|min:0',
            'payment_date' => 'nullable|date',
        ]);

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
        

        PurchasePayments::create([
            'purchase_id' => $purchase->id,
            'user_id' => auth()->id(),
            'paid_amount' => $paidAmount,
            'payment_date' => $request->payment_date ?? now(),
            'payment_method' => 'Cash',
            'total_amount' => $purchase->total_amount,
            'due_amount' => $dueAmount,
            'status' => $status,
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
}
