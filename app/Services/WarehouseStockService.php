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


        $query = $this->warehouseRepoInterface->query()
            ->with(['warehouse', 'asset.engineerRequestItems']);

        return DataTables::eloquent($query)
            ->addIndexColumn()


            ->editColumn('warehouse_id', function ($wareHouseStock) {
                return $wareHouseStock->warehouse->name ?? '';
            })

            ->editColumn('address', function ($wareHouseStock) {
                return $wareHouseStock->warehouse->address ?? '';
            })

            ->addColumn('quantity', function ($wareHouseStock) {
                if (!$wareHouseStock->asset) return 0;

                $totalPassed = $wareHouseStock->asset->engineerRequestItems->sum('passed_qty');

                return ($row->asset->quantity ?? 0) - $totalPassed;
            })
            ->addColumn('action', function ($wareHouseStock) {
                return view('admin.backend.warehouse-stocks._action', compact('wareHouseStock'))->render();
            })
            ->rawColumns([
                'action',
            ])
            ->make(true);
    }
}
