<?php

namespace App\Http\Controllers\Backend\StockManagement;

use App\Http\Controllers\Controller;
use App\Models\FixedAsset;
use App\Models\VariableAsset;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseStockController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        $fixedAssets = FixedAsset::all();
        $variableAssets = VariableAsset::all();
        return view('admin.backend.warehouse-stocks.index',compact('warehouses','fixedAssets','variableAssets'));
    }
}
