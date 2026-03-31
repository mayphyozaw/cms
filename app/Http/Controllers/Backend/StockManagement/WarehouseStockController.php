<?php

namespace App\Http\Controllers\Backend\StockManagement;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\FixedAsset;
use App\Models\VariableAsset;
use App\Models\Warehouse;
use App\Models\WareHouseStock;
use App\Services\WarehouseStockService;
use Illuminate\Http\Request;

class WarehouseStockController extends Controller
{

    protected $model;
    public function __construct(WarehouseStockService $warehouseStockService)
    {
        $this->warehouseStockService = $warehouseStockService;
    }


    public function index()
    {
        
        $warehouseStocks = WareHouseStock::with([
            'warehouse',
            'asset.fixedAsset',
            'asset.variableAsset'
        ])->get();
        
        $warehouses = Warehouse::all();
        return view('admin.backend.warehouse-stocks.index', compact('warehouseStocks', 'warehouses'));
    }

    public function warehouseStockDataTable()
    {
        return $this->warehouseStockService->warehouseStockDataTable();
    }
}
