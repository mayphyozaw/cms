<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\FixedAsset;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use App\Models\Warehouse;
use Exception;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchaseAllData = Purchase::orderBy('id', 'desc')->get();
        return view('admin.backend.purchase.index', compact('purchaseAllData'));
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

        $lastPurchase = Purchase::latest()->first();
        $nextNumber = $lastPurchase ? $lastPurchase->id + 1 : 1;
        $purchaseNo = 'PO-' . date('Ymd') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        $total_amount = 0;

        $purchase = Purchase::create([
            'purchase_date' => $request->purchase_date,
            'purchase_no' => $purchaseNo,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'discount' => $request->purchase_discount ?? 0,
            'shipping' => $request->shipping ?? 0,
            'status' => $request->status,
            'remark' => $request->remark ?? '',
            'total_amount' => 0
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

        $purchase->update([
            'total_amount' => $total,
        ]);

        return redirect()->route('purchase.index')->with([
            'message' => 'Purchase Stored successfully!',
            'alert-type' => 'success'
        ]);
    }
}
