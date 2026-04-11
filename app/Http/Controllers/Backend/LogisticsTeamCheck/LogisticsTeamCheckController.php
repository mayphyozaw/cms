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

                if (($asset->stock_balance ?? 0) < $passedQty) {
                    throw new \Exception("Not enough stock for {$asset->asset_name}");
                }
                $asset->total_passed_qty = ($asset->total_passed_qty ?? 0) + $passedQty;
                $asset->stock_balance = ($asset->stock_balance ?? 0) - $passedQty;
                $asset->save();
            }

            if ($warehouseId) {
                $warehouseStock = WarehouseStock::where('asset_id', $item->asset_id)
                    ->where('warehouse_id', $warehouseId)
                    ->first();

                if (!$warehouseStock) {
                    throw new \Exception("Warehouse stock not found");
                }

                if (($warehouseStock->stock_balance ?? 0) < $passedQty) {
                    throw new \Exception("Not enough stock in warehouse");
                }

                $warehouseStock->total_passed_qty = ($warehouseStock->asset->total_passed_qty ?? 0) + $passedQty;
                $warehouseStock->stock_balance = ($warehouseStock->asset->stock_balance ?? 0) - $passedQty;
                $warehouseStock->save();
            }

            $item->update([
                'transfer_from_warehouse_id' => $warehouseId,
                'transfer_from_project_id' => $projectId,
                'sent_date' => $data['sent_date'] ?? now(),
                'remark' => $data['remark'] ?? null,
            ]);
        }
        EngineerAssetRequests::where('id', $request->request_id)
            ->update([
                'status' => 'approved',
                'logistics_checked_status' => 'finished'
            ]);

        return redirect()->route('engineer-requests.index')
            ->with([
                'message' => 'Logistics transfer information saved successfully.',
                'alert-type' => 'success'
            ]);
    }
}
