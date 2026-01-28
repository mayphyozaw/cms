<?php

namespace App\Http\Controllers\Backend\MaterialManagement\VariableAssets;

use App\Http\Controllers\Controller;
use App\Http\Requests\VariableAssets\VariableCategoryStoreRequest;
use App\Http\Requests\VariableAssets\VariableCategoryUpdateRequest;
use App\Models\VariableCategory;
use App\Services\ResponseService;
use App\Services\VariableCategoryService;
use Exception;
use Illuminate\Http\Request;

class VariableCategoryController extends Controller
{
    protected $variableCategoryService;

    public function __construct(VariableCategoryService $variableCategoryService)
    {
        $this->variableCategoryService = $variableCategoryService;
    }

    public function index()
    {
        return view('admin.backend.materialmanage.variableassets.variable-category.index');
    }

    public function store(VariableCategoryStoreRequest $request)
    {
        VariableCategory::create([
            'variable_category_name' => $request->variable_category_name,
        ]);

        return redirect()->route('material.variable-category.index')
            ->with('success', 'Successfully created');
    }

    public function variablecategoryDataTable(Request $request)
    {
        return $this->variableCategoryService->variablecategoryDataTable($request);
    }

    public function edit($id)
    {
        $category = VariableCategory::findOrFail($id);

        return view('admin.backend.materialmanage.variableassets.variable-category.index', compact('category'));
    }
    public function confirm_update(VariableCategoryUpdateRequest $request)
    {
        $category = VariableCategory::findOrFail($request->category_id);

        $category->update([
            'variable_category_name' => $request->variable_category_name,
        ]);

        return redirect()
            ->route('material.variable-category.index')
            ->with('success', 'Category updated successfully!');
    }
    public function show()
    {
        $categories = VariableCategory::all();

        // return view('admin.backend.purchase.show', compact('purchase'));
        return view('admin.backend.materialmanage.variableassets.variable-category.index', compact('categories'));
    }

    public function destroy($id)
    {
        try {
            $this->variableCategoryService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
}
