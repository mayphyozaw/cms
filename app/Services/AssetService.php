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
                $totalAssetQty = $assets->quantity;
                return $totalAssetQty;
            })
            ->editColumn('total_passed_qty', function ($asset) {
                return $asset->total_passed_qty;
            })
            ->editColumn('stock_balance', function ($assets) {
                $totalStock = $assets->warehouseStock->sum('stock_balance');
                return $totalStock;
                // $url = route('qs.check.detail', ['asset_id' => $asset->id]);
                // return '<a href="' . $url . '" class="text-primary">' . $stock_balance . '</a>';
            })
            ->editColumn('status', function ($assets) {

                $color = match (strtolower($assets->status)) {
                    'available', 'active', 'readytouse' => 'bg-success',
                    'deployed' => 'bg-orange',
                    'returned' => 'bg-primary',
                    'inspection', 'maintenance', 'low stock' => 'bg-warning',
                    'damaged', 'out of stock' => 'bg-danger',
                    'disposed' => 'bg-secondary',
                    default => 'bg-dark',
                };
                $displayStatus = $assets->status;
                if (in_array(strtolower($assets->status), ['available', 'active', 'readytouse', 'out of stock'])) {
                    if ($assets->stock_balance == 0) {
                        $color = 'bg-danger';
                        $displayStatus = 'Active';
                    } elseif ($assets->stock_balance < 0) {
                        $color = 'bg-danger';
                        $displayStatus = 'Out of Stock';
                    } elseif ($assets->stock_balance <= 10) {
                        $color = 'bg-danger';
                        $displayStatus = 'Low Stock';
                    } else {
                        $displayStatus = 'Available';
                    }
                }
                return '<span class="badge ' . $color . ' text-white">' . $displayStatus . '</span>';
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
