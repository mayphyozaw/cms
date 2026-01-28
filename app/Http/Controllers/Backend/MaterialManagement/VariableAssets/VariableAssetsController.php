<?php

namespace App\Http\Controllers\Backend\MaterialManagement\VariableAssets;

use App\Http\Controllers\Controller;
use App\Http\Requests\VariableAssets\VariableAssetStoreRequest;
use App\Http\Requests\VariableAssets\VariableAssetUpdateRequest;
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
        return view('admin.backend.materialmanage.variableassets.create', compact('categories'));
    }

    public function variableassetsDataTable(Request $request)
    {
        return $this->variableAssetsService->variableassetsDataTable($request);
    }

    public function store(VariableAssetStoreRequest $request)
    {

        try {
            $variableAssetData = [
                'name'  => $request->name,
                'material_code'  => $request->material_code,
                'variable_category_id' => $request->variable_category_id,
                'unit' => $request->unit,
                'total_qty' => $request->total_qty,
                'remarks' => $request->remarks ?? null,
                'reorder_level' => $request->reorder_level ?? null,

            ];
            $this->variableAssetsService->create($variableAssetData);

            return redirect()->route('material.variableassets.index')
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
        $variableAsset = $this->variableAssetsService->find($id);
        $categories = VariableCategory::all();
        return view('admin.backend.materialmanage.variableassets.edit',compact('variableAsset','categories'));
    }

    public function update(VariableAssetUpdateRequest $request, $id)
    {
        $variableAssetData = [
            'name'        => $request->name,
            'material_code' => $request->material_code,
            'variable_category_id' => $request->variable_category_id,
            'unit'        => $request->unit,
            'total_qty'   => $request->total_qty,
            'reorder_level'      => $request->reorder_level,
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
