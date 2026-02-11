<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCategory\ProjectCategoryStoreRequest;
use App\Http\Requests\ProjectCategory\ProjectCategoryUpdateRequest;
use App\Models\ProjectCategory;
use App\Services\ProjectCategoryService;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    protected $projectCategoryService;

    public function __construct(ProjectCategoryService $projectCategoryService)
    {
        $this->projectCategoryService = $projectCategoryService;
    }

    public function index()
    {

        $project_categories = ProjectCategory::all();

        return view('admin.backend.projectmanage.projectcategory.index', compact('project_categories'));
    }

    public function create()
    {
        return view('admin.backend.projectmanage.projectcategory.create');
    }

    public function store(ProjectCategoryStoreRequest $request)
    {
        $projectCategory = [
            'title' => $request->title,
        ];
        $this->projectCategoryService->create($projectCategory);

        return redirect()->route('projectmanage.projectcategory.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function projectCategoryDataTable(Request $request)
    {
        return $this->projectCategoryService->projectCategoryDataTable($request);
    }


    
    public function edit($id)
    {
        $project_category = ProjectCategory::findOrFail($id);
        return view('admin.backend.projectmanage.projectcategory.edit', compact('project_category'));
    }

    public function update(ProjectCategoryUpdateRequest $request, $id)
    {
        $project_category = [
            'title' => $request->title,
            
        ];
        $this->projectCategoryService->update($id, $project_category);

        return redirect()->route('projectmanage.projectcategory.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    } 

    public function destroy($id)
    {
         try {
            $this->projectCategoryService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }

}
