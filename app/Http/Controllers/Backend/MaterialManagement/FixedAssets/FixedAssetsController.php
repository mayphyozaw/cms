<?php

namespace App\Http\Controllers\Backend\MaterialManagement\FixedAssets;

use App\Http\Controllers\Controller;
use App\Http\Requests\FixedAssets\FixedAssetStoreRequest;
use App\Http\Requests\FixedAssets\FixedAssetUpdateRequest;
use App\Models\FixedAssetCategory;
use App\Models\Warehouse;
use App\Services\CategoryService;
use App\Services\FixedAssetsService;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;

class FixedAssetsController extends Controller
{
    protected $model;

    public function __construct(FixedAssetsService $fixedAssetsService, CategoryService $categoryService)
    {
        $this->fixedAssetsService = $fixedAssetsService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.backend.materialmanage.fixedassets.index');
    }

    public function create()
    {
        $categories = FixedAssetCategory::all();
        $warehouses = Warehouse::all();
        return view('admin.backend.materialmanage.fixedassets.create', compact('categories','warehouses'));
    }

    public function fixedassetsDataTable(Request $request)
    {
        return $this->fixedAssetsService->fixedassetsDataTable($request);
    }


    public function store(FixedAssetStoreRequest $request)
    {

        try {
            $fixedAssetData = [
                'name'  => $request->name,
                'assets_code'  => $request->assets_code,
                'category_id' => $request->category_id,
                'warehouse_id' => $request->warehouse_id,
                'unit' => $request->unit,
                'total_qty' => $request->total_qty,
                'status' => $request->status ?? null,
                'remarks' => $request->remarks ?? null,

            ];
            $this->fixedAssetsService->create($fixedAssetData);

            return redirect()->route('material.fixedassets.index')
                ->with([
                    'message' => 'Successfully created',
                    'alert-type' => 'success'
                ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $fixedAsset = $this->fixedAssetsService->find($id);
        $categories = FixedAssetCategory::all();
        $warehouses = Warehouse::all();
        return view('admin.backend.materialmanage.fixedassets.edit', compact('fixedAsset', 'categories','warehouses'));
    }

    public function update(FixedAssetUpdateRequest $request, $id)
    {
        // $fixedAsset = $this->fixedAssetsService->find($id);

        $fixedAssetData = [
            'name'        => $request->name,
            'assets_code' => $request->assets_code,
            'warehouse_id' => $request->warehouse_id,
            'category_id' => $request->category_id,
            'unit'        => $request->unit,
            'total_qty'   => $request->total_qty,
            'status'      => $request->status,
            'remarks'     => $request->remarks,
        ];

        $this->fixedAssetsService->update($id, $fixedAssetData);

        return redirect()->route('material.fixedassets.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    }

    public function destroy($id)
    {
        try {
            $this->fixedAssetsService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }

    public function purchaseFixedAssets()
    {
        return view('admin.backend.materialmanage.fixedassets.index');
    }
}
