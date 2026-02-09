<?php

namespace App\Services;

use App\Repositories\Contracts\RoleRepoInterface;
use App\Repositories\Contracts\SupplierRepoInterface;
use App\Repositories\Contracts\UserRepoInterface;
use App\Repositories\Contracts\WarehouseRepoInterface;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleService
{
    protected $roleRepoInterface;

    public function __construct(RoleRepoInterface $roleRepoInterface)
    {
        $this->roleRepoInterface = $roleRepoInterface;
    }

    public function all()
    {
        return $this->roleRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->roleRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->roleRepoInterface->create($data);
        return $record;
    }

    public function roleDataTable(Request $request)
    {

        $query = $this->roleRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            // 
            ->addColumn('permissions',function($each){
                $output = "";
                foreach ($each->permissions as $permission) {
                   $output .= '<span class="badge rounded-pill text-bg-primary" style="margin-right:5px;">'.$permission->name.'</span>';
                }
                return $output;
            })  
            
            ->addColumn('action', function ($role) {
                return view('admin.backend.configuration.role._action', compact('role'))->render();
            })
            ->rawColumns([
                'permissions',
                'action',
            ])
            ->make(true);
    }


    public function update($id, array $data)
    {
        $record = $this->roleRepoInterface->update($data, $id);
        return $record;
    }


    public function delete($id)
    {
        $record = $this->roleRepoInterface->find($id);
        $record->delete();
    }
}
