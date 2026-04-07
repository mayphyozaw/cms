<?php

namespace App\Http\Controllers\Backend\QSTeamCheck;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\EngineerAssetRequestItems;
use App\Models\EngineerAssetRequests;
use App\Models\WarehouseStock;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class QSTeamCheckController extends Controller
{
    public function create($id)
    {
        $hasProcessingRequests = EngineerAssetRequests::whereHas('engineerAssetRequestItems', function ($q) {
            $q->whereNull('checked_by')
                ->orWhereNull('passed_qty')
                ->orWhereColumn('passed_qty', '<', 'quantity');
        })->exists();

        $requestItemsCheck = EngineerAssetRequests::with('engineerAssetRequestItems.asset.fixedAsset')->findOrFail($id);
        $workscope = WorkScope::all();
        return view('admin.backend.qs-team-check.create', compact('requestItemsCheck', 'workscope', 'hasProcessingRequests'));
    }


    public function store(Request $request)
    {
        foreach ($request->items as $itemId => $data) {

            $item = EngineerAssetRequestItems::find($itemId);

            if (!$item) continue;

            $passedQty = $data['passed_qty'] ?? 0;

            if ($passedQty > 0) {

                $item->update([
                    'passed_qty' => $passedQty,
                    'checked_by' => auth()->id(),
                    'checked_at' => now(),
                ]);


                $asset = $item->asset;

                // if ($asset) {

                //     if ($asset->quantity < $passedQty) {
                //         return back()->with([
                //             'message' => 'Not enough stock!',
                //             'alert-type' => 'error'
                //         ]);
                //     }
                //     $asset->stock_balance = $asset->quantity - $passedQty;
                //     $asset->save();

                //     $warehouseStock = WarehouseStock::where('asset_id', $asset->id)
                //         ->where('warehouse_id', $asset->warehouse_id)
                //         ->first();

                //     if ($warehouseStock) {
                //         $warehouseStock->stock_balance -= $passedQty;
                //         $warehouseStock->save();
                //     }
                // }
            }
        }


        EngineerAssetRequests::where('id', $request->request_id)
            ->update([
                'status' => 'approved',
                'qs_checked_status' => 'finished'
            ]);

        return redirect()->route('engineer-requests.index')
            ->with([
                'message' => 'Successfully checked',
                'alert-type' => 'success'
            ]);
    }

    public function show($asset_id)
    {


        $requestItemsCheck = EngineerAssetRequests::with('engineerAssetRequestItems.asset.fixedAsset')->findOrFail($asset_id);
        $workscope = WorkScope::all();
        return view('admin.backend.qs-team-check.show', compact('requestItemsCheck', 'workscope'));
    }
}
