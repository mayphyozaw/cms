<?php

namespace App\Http\Controllers\Backend\LogisticsTeamCheck;

use App\Http\Controllers\Controller;
use App\Models\EngineerAssetRequestItems;
use App\Models\EngineerAssetRequests;
use App\Models\Project;
use App\Models\Warehouse;
use App\Models\WarehouseStock;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class LogisticsTeamCheckController extends Controller
{
    public function create($id)
    {
        $requestItemsCheck = EngineerAssetRequests::with([
            'engineerAssetRequestItems.asset.fixedAsset',
            'project.client',
            'workscope'
        ])->findOrFail($id);
        $items = $requestItemsCheck->engineerAssetRequestItems;
        $projects = Project::all();
        $warehouses = Warehouse::all();
        return view('admin.backend.logistics-team-check.create', compact('requestItemsCheck', 'projects', 'warehouses', 'items'));
    }

    public function store(Request $request)
    {

        $items = $request->items ?? [];

        if (empty($items)) {
            return back()->with('error', 'No items selected for transfer.');
        }

        foreach ($items as $itemId => $data) {
            $item = EngineerAssetRequestItems::find($itemId);
            if (!$item) continue;

            $passedQty = $item->passed_qty;

            $warehouseId = $data['transfer_from_warehouse_id'] ?? null;
            $projectId = $data['transfer_from_project_id'] ?? null;

            $asset = $item->asset;

            if ($asset) {

                if ($asset->quantity < $passedQty) {
                    return back()->with([
                        'message' => 'Not enough stock!',
                        'alert-type' => 'error'
                    ]);
                }
                $asset->stock_balance = $asset->quantity - $passedQty;
                $asset->save();

                // if ($warehouseId) {
                //     $warehouseStock = WarehouseStock::where('asset_id', $item->asset_id)
                //         ->where('warehouse_id', $warehouseId)
                //         ->first();

                //     if (!$warehouseStock || $warehouseStock->stock_balance < $passedQty) {
                //         return back()->with('error', "Not enough stock in selected warehouse for asset {$item->asset->name}.");
                //     }

                //     $warehouseStock->stock_balance -= $passedQty;
                //     $warehouseStock->save();
                // }
            }

            if ($warehouseId) {
                $warehouseStock = WarehouseStock::where('asset_id', $item->asset_id)
                    ->where('warehouse_id', $warehouseId)
                    ->first();

                if (!$warehouseStock || $warehouseStock->stock_balance < $passedQty) {
                    return back()->with('error', "Not enough stock in selected warehouse for asset {$item->asset->name}.");
                }

                $warehouseStock->stock_balance -= $passedQty;
                $warehouseStock->save();
            }
            EngineerAssetRequests::where('id', $request->request_id)
                ->update([
                    'status' => 'approved',
                    'logistics_checked_status' => 'finished'
                ]);
            $item->update([
                'transfer_from_warehouse_id' => $warehouseId,
                'transfer_from_project_id' => $projectId,
                'sent_date' => $data['sent_date'] ?? now(),
                'remark' => $data['remark'] ?? null,
            ]);
        }


        EngineerAssetRequests::where('id', $request->request_id)
            ->update(['status' => 'approved']);

        return redirect()->route('engineer-requests.index')
            ->with([
                'message' => 'Logistics transfer information saved successfully.',
                'alert-type' => 'success'
            ]);
    }
}
