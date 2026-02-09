<?php

namespace App\Http\Controllers\Backend\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\PermissionStoreRequest;
use App\Http\Requests\Permission\PermissionUpdateRequest;
use App\Services\PermissionService;
use App\Services\ResponseService;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.backend.configuration.permission.index',compact('permissions'));
    }

    public function create()
    {
        return view('admin.backend.configuration.permission.create');
    }

    public function permissionDataTable(Request $request)
    {

        return $this->permissionService->permissionDataTable($request);
    }
    
    public function store(PermissionStoreRequest $request)
    {
        try {
            $this->permissionService->create([
                'name'  => $request->name,
                
            ]);

            return redirect()->route('configuration.permission.index')->with([
                'message' => 'Permission created successfully!',
                'alert-type' => 'success'
            ]);
        } catch (Exception $e) {
            
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.backend.configuration.permission.edit', compact('permission')); 
    }

    public function update(PermissionUpdateRequest $request, $id)
    {
        try {
            $this->permissionService->update([
                'name'  => $request->name,
            ],$id);
            
            return redirect()->route('configuration.permission.index')->with([
                'message' => 'Permission updated successfully!',
                'alert-type' => 'success'
            ]);
        } catch (Exception $e) {
           
            return back()->with('error', $e->getMessage())->withInput();
        }
    }
    
    public function destroy($id)
    {
        try {
            $this->permissionService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }


}
