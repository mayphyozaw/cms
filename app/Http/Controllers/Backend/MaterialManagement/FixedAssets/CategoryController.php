<?php

namespace App\Http\Controllers\Backend\MaterialManagement\FixedAssets;

use App\Http\Controllers\Controller;
use App\Http\Requests\FixedAssets\CategoryStoreRequest;
use App\Http\Requests\FixedAssets\CategoryUpdateRequest;
use App\Models\FixedAssetCategory;
use App\Services\CategoryService;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.backend.materialmanage.fixedassets.category.index');
    }

    public function store(CategoryStoreRequest $request)
    {
        FixedAssetCategory::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('material.category.index')
            ->with('success', 'Successfully created');
    }

    public function categoryDataTable(Request $request)
    {
        return $this->categoryService->categoryDataTable($request);
    }

    public function edit($id)
    {
        $category = FixedAssetCategory::findOrFail($id);

        return view('admin.backend.materialmanage.fixedassets.category.index', compact('category'));
    }
    public function update(CategoryUpdateRequest $request)
    {
        $this->categoryService->update(
            $request->category_id,
            $request->validated()
        );

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Updated successfully'
        // ]);

        return redirect()->route('material.category.index')
            ->with('success', 'Successfully created');
    }


    public function show()
    {
        $categories = FixedAssetCategory::all();

        // return view('admin.backend.purchase.show', compact('purchase'));
        return view('admin.backend.materialmanage.fixedassets.category.index', compact('categories'));
    }

    public function destroy($id)
    {
        try {
            $this->categoryService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
}
