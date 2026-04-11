<?php

namespace App\Services;

use App\Models\Asset;
use App\Repositories\Contracts\AssetRepoInterface;
use App\Repositories\Contracts\FixedAssetRepoInterface;
use App\Repositories\Contracts\WarehouseRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class WarehouseStockService
{
    protected $warehouseRepoInterface;

    public function __construct(WarehouseRepoInterface $warehouseRepoInterface)
    {
        $this->warehouseRepoInterface = $warehouseRepoInterface;
    }

    public function all()
    {
        return $this->warehouseRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->warehouseRepoInterface->find($id);
    }

    public function warehouseStockDataTable()
    {

        $query = $this->warehouseRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()


            ->addColumn('name', function ($wareHouseStock) {
                return $wareHouseStock->fixedAsset->name
                    ?? $wareHouseStock->variableAsset->name
                    ?? '-';
            })
            ->editColumn('warehouse_id', function ($wareHouseStock) {
                return $wareHouseStock->warehouse->name ?? '';
            })

            
            ->editColumn('quantity', function ($wareHouseStock) {
                return $wareHouseStock->quantity ?? '';
            })
            ->editColumn('total_passed_qty', function ($wareHouseStock) {
                return $wareHouseStock->asset->total_passed_qty ?? '';
            })
            ->editColumn('stock_balance', function ($wareHouseStock) {
                // $totalPassed = $asset->engineer_request_items_sum_passed_qty ?? 0;
                $stock_balance = $wareHouseStock->asset->stock_balance;
                
                $url = route('qs.check.detail', ['asset_id' => $wareHouseStock->asset->id]);
                return '<a href="' . $url . '" class="text-primary">' . $stock_balance . '</a>';
            })
            // ->editColumn('status', function ($wareHouseStock) {
            //     $color = match ($wareHouseStock->status) {
            //         'available' => 'bg-success',
            //         'inUse' => 'bg-warning',
            //         'damaged' => 'bg-danger',
            //         'disposed' => 'bg-info',
            //         'maintenance' => 'bg-info',
            //         default => 'bg-danger',
            //     };

            //     return '<span class="badge badge-status ' . $color . '">' . $wareHouseStock->status . '</span>';
            // })
            ->editColumn('status', function($wareHouseStock){
                // $status = $wareHouseStock->asset->status;

                $color = match (strtolower($wareHouseStock->status)) {
                    'available', 'active', 'readytouse' => 'bg-success',
                    'deployed' => 'bg-orange',
                    'returned' => 'bg-primary',
                    'inspection', 'maintenance', 'low stock' => 'bg-warning',
                    'damaged', 'out of stock' => 'bg-danger',
                    'disposed' => 'bg-secondary',
                    default => 'bg-dark',
                };
                $displayStatus = $$wareHouseStock->asset->status;;
                if (in_array(strtolower($wareHouseStock->asset->status), ['available', 'active', 'readytouse', 'out of stock'])) {
                    if ($wareHouseStock->stock_balance <= 0) {
                        $color = 'bg-danger';
                        $displayStatus = 'Out of Stock';
                    } elseif ($wareHouseStock->stock_balance <= 10) {
                        $color = 'bg-warning';
                        $displayStatus = 'Low Stock';
                    } else {
                        $displayStatus = 'Available';
                    }
                }
                return '<span class="badge ' . $color . ' text-white">' . $displayStatus . '</span>';
            })
            ->addColumn('action', function ($wareHouseStock) {
                return view('admin.backend.materialmanage.warehouse-stocks._action', compact('wareHouseStock'))->render();
            })
            ->rawColumns([
                'status',
                'action',
                'stock_balance',
            ])
            ->make(true);
    }

}
