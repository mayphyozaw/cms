<?php

namespace App\Services;

use App\Repositories\Contracts\PermissionRepoInterface;
use App\Repositories\Contracts\RoleRepoInterface;
use App\Repositories\Contracts\SupplierRepoInterface;
use App\Repositories\Contracts\UserRepoInterface;
use App\Repositories\Contracts\WarehouseRepoInterface;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionService
{
    protected $permissionRepoInterface;

    public function __construct(PermissionRepoInterface $permissionRepoInterface)
    {
        $this->permissionRepoInterface = $permissionRepoInterface;
    }

    public function all()
    {
        return $this->permissionRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->permissionRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->permissionRepoInterface->create($data);
        return $record;
    }

    public function permissionDataTable(Request $request)
    {

        $query = $this->permissionRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($permission) {
                return view('admin.backend.configuration.permission._action', compact('permission'))->render();
                
            })
            ->rawColumns([
                'action',
            ])
            ->make(true);
    }


    public function update(array $data, $id)
    {
        $record = $this->permissionRepoInterface->update($data, $id);
        return $record;
    }


    public function delete($id)
    {
        $record = $this->permissionRepoInterface->find($id);
        $record->delete();
    }
}
