<?php

namespace App\Http\Controllers\Backend\MaterialManagement\VariableAssets;

use App\Http\Controllers\Controller;
use App\Http\Requests\VariableAssets\VariableAssetStoreRequest;
use App\Http\Requests\VariableAssets\VariableAssetUpdateRequest;
use App\Models\BoqCategories;
use App\Models\VariableAsset;
use App\Models\VariableCategory;
use App\Services\ResponseService;
use App\Services\VariableAssetsService;
use Exception;
use Illuminate\Http\Request;

class VariableAssetsController extends Controller
{
    protected $variableAssetsService;

    public function __construct(VariableAssetsService $variableAssetsService)
    {
        $this->variableAssetsService = $variableAssetsService;
    }

    public function index()
    {
        return view('admin.backend.materialmanage.variableassets.index');
    }

    public function create()
    {
        $categories = VariableCategory::all();
        $boqCategories = BoqCategories::all();
        return view('admin.backend.materialmanage.variableassets.create', compact('categories','boqCategories'));
    }

    public function variableassetsDataTable(Request $request)
    {
        return $this->variableAssetsService->variableassetsDataTable($request);
    }

    public function store(VariableAssetStoreRequest $request)
    {

        
        $lastAsset = VariableAsset::latest('id')->first();
        $nextId = $lastAsset ? $lastAsset->id + 1 : 1;

        $variableAssetCode = 'V-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        
        $variableAssetData = [
            'name'  => $request->name,
            'material_code'  => $variableAssetCode,
            'variable_category_id' => $request->variable_category_id,
            'boq_category_id' => $request->boq_category_id,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'remarks' => $request->remarks ?? null,

        ];
        $this->variableAssetsService->create($variableAssetData);

        return redirect()->route('material.variableassets.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    
    public function edit($id)
    {
        $variableAsset = $this->variableAssetsService->find($id);
        $categories = VariableCategory::all();
        $boqCategories = BoqCategories::all();
        return view('admin.backend.materialmanage.variableassets.edit', compact('variableAsset', 'categories','boqCategories'));
    }

    public function update(VariableAssetUpdateRequest $request, $id)
    {
        $variableAssetData = [
            'name'        => $request->name,
            'material_code' => $request->material_code,
            'variable_category_id' => $request->variable_category_id,
            'boq_category_id' => $request->boq_category_id,
            'unit'        => $request->unit,
            'quantity'   => $request->quantity,
            'remarks'     => $request->remarks,
        ];

        $this->variableAssetsService->update($id, $variableAssetData);

        return redirect()->route('material.variableassets.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    }

    public function destroy($id)
    {
        try {
            $this->variableAssetsService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
}
