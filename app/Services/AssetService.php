<?php

namespace App\Services;

use App\Models\Asset;
use App\Repositories\Contracts\AssetRepoInterface;
use App\Repositories\Contracts\FixedAssetRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class AssetService
{
    protected $assetRepoInterface;

    public function __construct(AssetRepoInterface $assetRepoInterface)
    {
        $this->assetRepoInterface = $assetRepoInterface;
    }

    public function all()
    {
        return $this->assetRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->assetRepoInterface->find($id);
    }


    public function create(array $data)
    {
        $warehouseId = $data['warehouse_id'] ?? null;

        $asset = Asset::where('warehouse_id', $warehouseId)
            ->where(function ($q) use ($data) {
                if (!empty($data['fixed_asset_id'])) {
                    $q->where('fixed_asset_id', $data['fixed_asset_id']);
                }
                if (!empty($data['variable_asset_id'])) {
                    $q->where('variable_asset_id', $data['variable_asset_id']);
                }
            })
            ->first();

        if ($asset) {
            $asset->quantity += $data['quantity'];
            $asset->save();
            return $asset;
        }

        $record = $this->assetRepoInterface->create($data);
        return $record;
    }


    public function assetsDataTable()
    {

        $query = $this->assetRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()


            ->addColumn('name', function ($assets) {
                return $assets->fixedAsset->name
                    ?? $assets->variableAsset->name
                    ?? '-';
            })
            ->editColumn('warehouse_id', function ($assets) {
                return $assets->warehouse->name ?? '';
            })

            ->addColumn('category_name', function ($assets) {
                return $assets->category_name;
            })

            ->editColumn('unit', function ($assets) {
                return $assets->unit ?? '';
            })
            ->editColumn('quantity', function ($assets) {
                return $assets->quantity ?? '';
            })
            ->editColumn('stock_balance', function ($asset) {
                // $totalPassed = $asset->engineer_request_items_sum_passed_qty ?? 0;
                $stock_balance = $asset->stock_balance;
                
                $url = route('qs.check.detail', ['asset_id' => $asset->id]);
                return '<a href="' . $url . '" class="text-primary">' . $stock_balance . '</a>';
            })
            ->editColumn('status', function ($assets) {
                $color = match ($assets->status) {
                    'available' => 'bg-success',
                    'inUse' => 'bg-warning',
                    'damaged' => 'bg-danger',
                    'disposed' => 'bg-info',
                    'maintenance' => 'bg-info',
                    default => 'bg-danger',
                };

                return '<span class="badge badge-status ' . $color . '">' . $assets->status . '</span>';
            })
            ->addColumn('action', function ($assets) {
                return view('admin.backend.materialmanage.assets._action', compact('assets'))->render();
            })
            ->rawColumns([
                'status',
                'action',
                'stock_balance',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->assetRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->assetRepoInterface->find($id);
        $record->delete();
    }
}
