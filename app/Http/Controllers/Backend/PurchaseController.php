<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\FixedAsset;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\PurchasePayments;
use App\Models\Supplier;
use App\Models\Warehouse;
use Exception;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchaseAllData = Purchase::with([
            'purchaseItems.asset.fixedAsset'
        ])->get();
        $suppliers = Supplier::all();
        $assets = Asset::all();
        return view('admin.backend.purchase.index', compact('purchaseAllData', 'suppliers', 'assets'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        // $assets = Asset::all();
        $fixedAssets = FixedAsset::all();
        $purchaseData = Purchase::with([
            'purchaseItems.asset.fixedAsset'
        ])->get();
        return view('admin.backend.purchase.create', compact('suppliers', 'warehouses', 'fixedAssets', 'purchaseData'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'warehouse_id' => 'required',
            'supplier_id' => 'required',
            'asset_id' => 'required|array',
            'quantity.*' => 'required|numeric|min:1',
            'net_unit_cost.*' => 'required|numeric|min:0',
            'purchase_discount' => 'nullable|numeric|min:0',
            'shipping' => 'nullable|numeric|min:0',
        ]);


        $lastPurchase = Purchase::latest()->first();
        $nextNumber = $lastPurchase ? $lastPurchase->id + 1 : 1;
        $purchaseNo = 'PO-' . date('Ymd') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        $total_amount = 0;
        $due_amount = 0;

        $purchase = Purchase::create([
            'purchase_date' => now(),
            'purchase_no' => $purchaseNo,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'discount' => $request->purchase_discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'status' => $request->status,
            'remark' => $request->remark ?? '',
            'total_amount' => 0,
            'due_amount' => 0,
            'payment_status' => $request->payment_status ?? '',

        ]);

        foreach ($request->asset_id as $index => $assetId) {
            $asset = Asset::findOrFail($assetId);
            $net_unit_cost = $request->net_unit_cost[$index];
            $quantity = $request->quantity[$index];
            $discount = $request->discount[$index] ?? 0;

            if ($net_unit_cost == 0) {
                throw new \Exception("Net Unit Cost missing for product id " . $assetId);
            }

            $subtotal = ($net_unit_cost * $quantity) - $discount;

            $total_amount += $subtotal;

            PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'asset_id' => $assetId,
                'net_unit_cost' => $net_unit_cost,
                'quantity' => $quantity,
                'discount' => $discount,
                'subtotal' => $subtotal,
            ]);

            $asset->increment('quantity', $quantity);
        }

        $total = $total_amount + ($request->shipping ?? 0) - ($request->purchase_discount ?? 0);

        $due_amount = $total_amount + ($request->shipping ?? 0) - ($request->purchase_discount ?? 0);


        if ($due_amount == 0) {
            $payment_status = 'Paid';
        } else {
            $payment_status = 'Unpaid';
        }

        $purchase->update([
            'total_amount' => $total,
            'due_amount' => $due_amount,
            'payment_status' => $payment_status,
        ]);

        $paidAmount = $request->paid_amount ?? 0;

        $dueAmount = $total - $paidAmount;

        
            PurchasePayments::create([
                'purchase_id' => $purchase->id,
                'user_id' => auth()->id(),
                'paid_amount' => $paidAmount,
                'payment_date' => $request->payment_date ?? now(),
                'payment_method' => 'Cash',
                'total_amount' => $total,
                'due_amount' => $dueAmount,
                'status' => $payment_status,
            ]);
       

        // // Insert Payment
        // PurchasePayments::create([
        //     'purchase_id' => $purchase->id,
        //     'user_id' => auth()->id(),
        //     'paid_amount' => $paidAmount,
        //     'payment_date' => $request->payment_date ?? now(),
        //     'status' => $request->status,
        //     'payment_method' => 'Cash',
        //     'total_amount' => $total,
        //     'due_amount' => $dueAmount,
        //     'status' => $payment_status,
        // ]);


        return redirect()->route('purchase.index')->with([
            'message' => 'Purchase Stored successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $purchaseData = Purchase::with('purchaseItems.asset.fixedAsset')->findOrFail($id);
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $fixedAssets = FixedAsset::all();
        return view('admin.backend.purchase.edit', compact('purchaseData', 'warehouses', 'suppliers', 'fixedAssets'));
    }



    public function update(Request $request, $id)
    {

        $purchase = Purchase::findOrFail($id);

        $purchase->update([
            'purchase_date' => $request->purchase_date,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'discount' => $request->purchase_discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'status' => $request->status,
            'remark' => $request->remark ?? '',
            'total_amount' => $request->total_amount,
            'paid_amount' => $request->paid_amount ?? 0,
            'full_paid' => $request->full_paid ?? 0,
            'due_amount' => $request->due_amount ?? 0,
        ]);
        $total_amount = 0;
        foreach ($request->asset_id as $index => $value) {
            $asset_id = $value;
            $net_unit_cost = $request->net_unit_cost[$index];
            $quantity = $request->quantity[$index];
            $discount = $request->discount[$index];
            $subtotal = $request->subtotal[$index];

            $subtotal = ($net_unit_cost * $quantity) - $discount;

            $total_amount += $subtotal;

            PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'asset_id' => $value,
                'net_unit_cost' => $net_unit_cost,
                'quantity' => $quantity,
                'discount' => $discount,
                'subtotal' => $subtotal,
            ]);


            $total = $total_amount + ($request->shipping ?? 0) - ($request->purchase_discount ?? 0);

            $purchase->update([
                'total_amount' => $total,
                'paid_amount' => $request->paid_amount ?? 0,
                'full_paid' => $request->full_paid ?? 0,
                'due_amount' => $request->due_amount ?? 0,
            ]);
        }
        return redirect()->route('purchase.index')->with([
            'message' => 'Purchase Updatd successfully!',
            'alert-type' => 'success'
        ]);
    }


    public function purchaseDue()
    {
        $purchaseAllData = Purchase::with(['supplier', 'purchaseItems.asset.fixedAsset'])->get();

        return view('admin.backend.purchase.payment.purchase_due', compact('purchaseAllData'));
    }

    //     public function pay($id)
    // {
    //     $purchaseData = Purchase::with(['supplier', 'purchaseItems.asset.fixedAsset'])->findOrFail($id);

    //     return view('admin.backend.purchase.pay', compact('purchaseData'));
    // }

}
