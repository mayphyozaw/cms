<?php

namespace App\Services;

use App\Repositories\Contracts\SupplierRepoInterface;
use App\Repositories\Contracts\UserRepoInterface;
use App\Repositories\Contracts\WarehouseRepoInterface;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseService
{
    protected $warehouseRepoInterface;

    public function __construct(WarehouseRepoInterface $warehouseRepoInterface)
    {
        $this->warehouseRepoInterface = $warehouseRepoInterface;
    }

    public function all()
    {
        return $this->warehouseRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->warehouseRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->warehouseRepoInterface->create($data);
        return $record;
    }

    public function warehouseDataTable(Request $request)
    {

        $query = $this->warehouseRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->editColumn('name', function ($warehouse) {
                return $warehouse->name;
            })
            ->editColumn('address', function ($warehouse) {
                return $warehouse->address;
            })
            ->editColumn('remark', function ($warehouse) {
                return $warehouse->remark;
            })
            
            ->addColumn('action', function ($warehouse) {
                return view('admin.backend.warehouse._action', compact('warehouse'))->render();
            })
            ->rawColumns([
                'name',
                'address',
                'remark',
                'action',
            ])
            ->make(true);
    }


    public function update($id, array $data)
    {
        $record = $this->warehouseRepoInterface->update($data, $id);
        return $record;
    }


    public function delete($id)
    {
        $record = $this->warehouseRepoInterface->find($id);
        $record->delete();
    }
}
