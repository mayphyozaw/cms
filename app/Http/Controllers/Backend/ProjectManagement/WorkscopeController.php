<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkScope\WorkScopeStoreRequest;
use App\Http\Requests\WorkScope\WorkScopeUpdateRequest;
use App\Models\WorkScope;
use App\Services\ResponseService;
use App\Services\WorkScopeService;
use Exception;
use Illuminate\Http\Request;

class WorkscopeController extends Controller
{
    protected $workScopeService;

    public function __construct(WorkScopeService $workScopeService)
    {
        $this->workScopeService = $workScopeService;
    }

    public function index()
    {

        $work_scopes = WorkScope::all();

        return view('admin.backend.projectmanage.workscope.index', compact('work_scopes'));
    }

    public function create()
    {
        return view('admin.backend.projectmanage.workscope.create');
    }

    public function store(WorkScopeStoreRequest $request)
    {
        $work_scope = [
            'title' => $request->title,
        ];
        $this->workScopeService->create($work_scope);

        return redirect()->route('projectmanage.workscope.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function workscopeDataTable(Request $request)
    {
        return $this->workScopeService->workscopeDataTable($request);
    }


    
    public function edit($id)
    {
        $work_scope = WorkScope::findOrFail($id);
        return view('admin.backend.projectmanage.workscope.edit', compact('work_scope'));
    }

    public function update(WorkScopeUpdateRequest $request, $id)
    {
        $work_scope = [
            'title' => $request->title,
            
        ];
        $this->workScopeService->update($id, $work_scope);

        return redirect()->route('projectmanage.workscope.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    } 

    public function destroy($id)
    {
         try {
            $this->workScopeService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }

}

