<?php

namespace App\Http\Controllers\Backend\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Services\ResponseService;
use App\Services\RoleService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        // if(!auth()->user()->hasPermissionTo('all_roles')){
        //     abort(403, 'Unauthorized Action');
        // }

        $roles = Role::all();
        return view('admin.backend.configuration.role.index', compact('roles'));
    }

    public function create()
    {
        
        $permissions = Permission::all();
        return view('admin.backend.configuration.role.create', compact('permissions'));
    }

    

    public function roleDatatable(Request $request)
    {

        return $this->roleService->roleDatatable($request);
    }

    public function store(RoleStoreRequest $request)
    {
        try{
            $role = $this->roleService->create([
                'name' => $request->name,
            ]);
            $role->givePermissionTo($request->permissions);
            
            return Redirect::route('configuration.role.index')->with('success', 'Successfully created');
        }catch (Exception $e) {

            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $old_permissions = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::all();

        return view('admin.backend.configuration.role.edit', compact('role','old_permissions','permissions'));
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        try{
            $role = $this->roleService->update($id,[
                'name' => $request->name,
            ]);
            // $old_permissions =$role->permissions->pluck('name')->toArray();
            // $role->revokePermissionTo($old_permissions);

            // $role->givePermissionTo($request->permissions);
            $role->syncPermissions($request->permissions);

            return redirect()->route('configuration.role.index')->with([
                'message' => 'Roles updated successfully!',
                'alert-type' => 'success'
            ]);
        }catch (Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->roleService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
}
