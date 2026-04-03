<?php

namespace App\Http\Controllers\Backend\MaterialManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assets\AssetStoreRequest;
use App\Models\Asset;
use App\Models\FixedAsset;
use App\Models\FixedAssetCategory;
use App\Models\VariableAsset;
use App\Models\VariableCategory;
use App\Models\Warehouse;
use App\Services\AssetService;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;

use function Illuminate\Log\log;

class AssetController extends Controller
{

    protected $model;

    public function __construct(AssetService $assetService)
    {
        $this->assetService = $assetService;
    }


    public function index()
    {
        $assets = Asset::with(['fixedAsset', 'variableAsset'])
            ->withSum('engineerRequestItems as total_passed', 'passed_qty')
            ->get();
        $fixedAsset = FixedAsset::all();
        $variableAsset = VariableAsset::all();
        $fixedCount = Asset::where('asset_type', 'fixedAsset')->count();
        $variableCount = Asset::where('asset_type', 'variableAsset')->count();
        return view('admin.backend.materialmanage.assets.index', compact('assets', 'fixedAsset', 'variableAsset', 'fixedCount', 'variableCount'));
    }

    public function create()
    {
        $warehouses = Warehouse::all();
        $categories = FixedAssetCategory::all();
        $variableCategories = VariableCategory::all();
        $fixedAsset = FixedAsset::all();
        $variableAsset = VariableAsset::all();
        $assets = Asset::with(['fixedAsset', 'variableAsset'])->get();
        return view('admin.backend.materialmanage.assets.create', compact('warehouses', 'categories', 'fixedAsset', 'variableAsset', 'assets', 'variableCategories'));
    }


    public function store1(Request $request)
    {


        $assetData = [
            'asset_type'   => $request->asset_type,
            'warehouse_id'   => $request->warehouse_id,
            'unit'         => $request->unit,
            'quantity'     => $request->quantity,
            'status'       => $request->status,
            'remarks'      => $request->remarks,
        ];


        if ($request->asset_type == 'fixedAsset') {
            $assetData['fixed_asset_id'] = $request->asset_id;
            $assetData['fixed_category_id'] = $request->category_id;

            $assetData['variable_asset_id'] = null;
            $assetData['variable_category_id'] = null;
        } else {
            $assetData['variable_asset_id'] = $request->asset_id;
            $assetData['variable_category_id'] = $request->category_id;

            $assetData['fixed_asset_id'] = null;
            $assetData['fixed_category_id'] = null;
        }

        $this->assetService->create($assetData);

        return redirect()->route('material.assets.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function store(Request $request)
    {
        $assetData = [
            'asset_type'   => $request->asset_type,
            'warehouse_id' => $request->warehouse_id,
            'unit'         => $request->unit,
            'quantity'     => $request->quantity,
            'stock_balance' => $request->quantity, 
            'status'       => $request->status,
            'remarks'      => $request->remarks,
        ];

        if ($request->asset_type == 'fixedAsset') {
            $assetData['fixed_asset_id'] = $request->asset_id;
            $assetData['fixed_category_id'] = $request->category_id;

            $assetData['variable_asset_id'] = null;
            $assetData['variable_category_id'] = null;
        } else {
            $assetData['variable_asset_id'] = $request->asset_id;
            $assetData['variable_category_id'] = $request->category_id;

            $assetData['fixed_asset_id'] = null;
            $assetData['fixed_category_id'] = null;
        }

        $this->assetService->create($assetData);

        return redirect()->route('material.assets.index')->with([
            'message' => 'Successfully created',
            'alert-type' => 'success'
        ]);
    }

    public function getAssetsByType(Request $request)
    {
        if ($request->type == 'fixedAsset') {
            $assets = FixedAsset::select('id', 'name')->get();
        } else {
            $assets = VariableAsset::select('id', 'name')->get();
        }

        return response()->json($assets);
    }



    public function getAssetDetail(Request $request)
    {
        $type = $request->type;
        $id   = $request->asset_id;

        if ($type == 'fixedAsset') {
            $asset = FixedAsset::find($id);
            $categoryId = $asset->category_id ?? null;
        } else {
            $asset = VariableAsset::find($id);
            $categoryId = $asset->variable_category_id ?? null;
        }

        return response()->json([
            'category_id' => $categoryId,
        ]);
    }


    public function getCategoriesByType(Request $request)
    {
        if ($request->type == 'fixedAsset') {
            $categories = FixedAssetCategory::select('id', 'category_name as name')->get();
        } else {
            $categories = VariableCategory::select('id', 'variable_category_name as name')->get();
        }

        return response()->json($categories);
    }


    public function assetsDataTable()
    {
        return $this->assetService->assetsDataTable();
    }



    public function destroy($id)
    {
        try {
            $this->assetService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
}
