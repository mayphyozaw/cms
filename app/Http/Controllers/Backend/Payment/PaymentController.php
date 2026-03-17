<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Models\FixedAsset;
use App\Models\Purchase;
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
            'supplier',
            'payments.user',
            'purchaseItems.asset.fixedAsset'
        ])
            ->where('due_amount', '>', 0)
            ->get();
        
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $fixedAssets = FixedAsset::all();
        return view('admin.backend.purchase.payment.purchase_due', compact('purchaseAllData', 'warehouses', 'suppliers', 'fixedAssets'));
    }
}
