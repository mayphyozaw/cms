<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\EngineerAssetRequests;
use App\Models\FixedAsset;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\PurchasePayments;
use App\Models\Supplier;
use App\Models\VariableAsset;
use App\Models\Warehouse;
use App\Models\WarehouseStock;
use Exception;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchaseAllData = Purchase::with([
            'purchaseItems.asset.fixedAsset',
            'purchaseItems.asset.variableAsset'
        ])->get();

        $suppliers = Supplier::all();
        $assets = Asset::all();
        return view('admin.backend.purchase.index', compact('purchaseAllData', 'suppliers', 'assets'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        $fixedAssets = FixedAsset::all();
        $purchaseData = Purchase::with([
            'purchaseItems.engineerAssetRequests.asset.fixedAsset'
        ])->get();
        return view('admin.backend.purchase.create', compact('suppliers', 'warehouses', 'fixedAssets', 'purchaseData'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'warehouse_id' => 'required',
            'supplier_id' => 'required',
            'asset_id' => 'required|array',
            'asset_type' => 'required|array',
            'quantity.*' => 'required|numeric|min:1',
            'net_unit_cost.*' => 'required|numeric|min:0',
            'purchase_discount' => 'nullable|numeric|min:0',
            'shipping' => 'nullable|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
        ]);


        $lastPurchase = Purchase::latest()->first();
        $nextNumber = $lastPurchase ? $lastPurchase->id + 1 : 1;
        $purchaseNo = 'PO-' . date('Ymd') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        $invoiceNo = 'INV-' . date('Y') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        $total_amount = 0;
        $subtotal_amount = 0;
        $due_amount = 0;

        $purchase = Purchase::create([
            'purchase_date' => now(),
            'purchase_no' => $purchaseNo,
            'invoice_no' => $invoiceNo,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'tax_amount' => $request->tax_amount ?? 0,
            'discount' => $request->purchase_discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'status' => $request->status,
            'remark' => $request->remark ?? '',
            'subtotal_amount' => 0,
            'total_amount' => 0,
            'due_amount' => 0,
            'payment_status' => $request->payment_status ?? '',

        ]);



        foreach ($request->asset_id as $index => $id) {
            // $asset = Asset::findOrFail($id);

            $type = $request->asset_type[$index];

            $net_unit_cost = $request->net_unit_cost[$index];
            $quantity = $request->quantity[$index];
            $discount = $request->discount[$index] ?? 0;
            $taxPercent = $request->tax_amount[$index] ?? 0;

            $subtotal = ($net_unit_cost * $quantity) - $discount;

            $subtotal_amount += $subtotal;
            $taxAmount = ($subtotal_amount * $taxPercent) / 100;
            $total_amount = $subtotal_amount + $taxAmount;

            $purchaseItems = PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'asset_request_id' => $request->asset_request_id[$index] ?? null,
                'asset_id' => $id,
                'asset_type' => $type,
                'fixed_asset_id' => $type === 'fixedAsset' ? $id : null,
                'variable_asset_id' => $type === 'variableAsset' ? $id : null,
                'net_unit_cost' => $net_unit_cost,
                'quantity' => $quantity,
                'discount' => $discount,
                'subtotal' => $subtotal,
            ]);



            if ($type === 'fixedAsset') {

                $stock = Asset::where('fixed_asset_id', $id)
                    ->where('warehouse_id', $request->warehouse_id)
                    ->first();

                if ($stock) {
                    $stock->quantity += $quantity;
                    $stock->stock_balance += $quantity;
                    $stock->save();
                } else {
                    $stock = Asset::create([
                        'warehouse_id' => $request->warehouse_id,
                        'fixed_asset_id' => $id,
                        'variable_asset_id' => null,
                        'asset_type' => 'fixedAsset',
                        'quantity' => $quantity,
                        'stock_balance' => $quantity,

                    ]);
                    
                }
            } else {

                $stock = Asset::where('variable_asset_id', $id)
                    ->where('warehouse_id', $request->warehouse_id)
                    ->first();

                if ($stock) {
                    $stock->quantity += $quantity;
                    $stock->stock_balance += $quantity;
                    $stock->save();
                } else {
                    $stock = Asset::create([
                        'warehouse_id' => $request->warehouse_id,
                        'fixed_asset_id' => null,
                        'variable_asset_id' => $id,
                        'asset_type' => 'variableAsset',
                        'quantity' => $quantity,
                        'stock_balance' => $quantity,
                    ]);
                    
                }
            }

            $warehouseStock = WarehouseStock::where('asset_id', $stock->id)
                ->where('warehouse_id', $request->warehouse_id)
                ->first();

            if ($warehouseStock) {
                $warehouseStock->quantity += $quantity;
                $warehouseStock->stock_balance += $quantity;
                $warehouseStock->save();
            } else {
                WarehouseStock::create([
                    'warehouse_id' => $request->warehouse_id,
                    'asset_id' => $stock->id,
                    'quantity' => $quantity,
                    'stock_balance' => $quantity,

                ]);
                // $warehouseStock->updateWarehouseStockStatus();
            }
        }
        
        $total = $total_amount - ($request->purchase_discount ?? 0) + ($request->shipping ?? 0);

        $paidAmount = $request->paid_amount ?? 0;
        $dueAmount = $total - $paidAmount;

        // $payment_status = $dueAmount <= 0 ? 'Paid' : 'Unpaid';

        if ($dueAmount == $total) {
            $payment_status = 'Unpaid';
        } elseif ($dueAmount > 0) {
            $payment_status = 'Partial';
        } else {
            $payment_status = 'Paid';
        }

        $purchase->update([
            'subtotal_amount' => $subtotal_amount,
            'tax_amount' => $taxAmount,
            'total_amount' => $total,
            'due_amount' => $dueAmount,
            'payment_status' => $payment_status,
        ]);


        $paidAmount = $request->paid_amount ?? 0;

        $dueAmount = $total - $paidAmount;

        $payment_proof_img_name = null;
        if ($request->hasFile('payment_proof')) {
            $payment_proof_img_file = $request->file('payment_proof');
            $payment_proof_img_name = uniqid() . '_' . time() . '.' . $payment_proof_img_file->getClientOriginalExtension();
            $payment_proof_img_file->move(public_path('/upload/user_images'), $payment_proof_img_name);
        }
        //Payment Record
        PurchasePayments::create([
            'purchase_id' => $purchase->id,
            'user_id' => auth()->id(),
            'paid_amount' => $paidAmount,
            'payment_date' => $request->payment_date ?? now(),
            'payment_method' => $request->payment_method,
            'total_amount' => $total,
            'due_amount' => $dueAmount,
            'status' => $payment_status,
            'payment_proof' => $payment_proof_img_name,
        ]);

        return redirect()->route('purchase.index')->with([
            'message' => 'Purchase Stored successfully!',
            'alert-type' => 'success'
        ]);
    }


    public function edit($id)
    {
        $purchaseData = Purchase::with('engineerAssetRequests', 'purchaseItems.asset.fixedAsset')->findOrFail($id);
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
            'asset_request_id' => $request->asset_request_id,
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

    public function invoicePurchase($id)
    {
        $purchaseData = Purchase::with(['supplier',  'warehouse', 'purchaseItems.engineerAssetRequests.asset.fixedAsset'])->find($id);
        $pdf = Pdf::loadView('admin.backend.purchase.invoice_pdf', compact('purchaseData'));
        return $pdf->download('purchase_' . $id . '.pdf');
    }

    public function detailPurchase($id)
    {
        $purchaseData = Purchase::with(['supplier', 'warehouse', 'purchaseItems.engineerAssetRequests.asset.fixedAsset'])->find($id);
        // $purchaseData = Purchase::with(['supplier', 'engineerAssetRequests'])->get();
        // return $purchaseData;
        return view('admin.backend.purchase.detail', compact('purchaseData'));
    }


    public function purchaseOrder($id)
    {
        $purchaseData = Purchase::with(['supplier', 'warehouse', 'purchaseItems.engineerAssetRequests.asset.fixedAsset'])->find($id);
        $pdf = Pdf::loadView('admin.backend.purchase.purchase_order_pdf', compact('purchaseData'));
        return $pdf->download('purchase_order_' . $id . '.pdf');
    }
}
