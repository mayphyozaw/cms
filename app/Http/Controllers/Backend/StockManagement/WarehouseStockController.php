<?php

namespace App\Http\Controllers\Backend\StockManagement;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\FixedAsset;
use App\Models\VariableAsset;
use App\Models\Warehouse;
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
        $warehouses = Warehouse::all();
        $assets = Asset::with(['fixedAsset', 'variableAsset'])->withSum('engineerRequestItems', 'passed_qty')->get();
        return view('admin.backend.warehouse-stocks.index',compact('warehouses','assets'));
    }

    public function warehouseStockDataTable()
    {
        return $this->warehouseStockService->warehouseStockDataTable();
    }
}
