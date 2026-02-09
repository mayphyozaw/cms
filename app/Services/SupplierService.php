<?php

namespace App\Services;

use App\Repositories\Contracts\SupplierRepoInterface;
use App\Repositories\Contracts\UserRepoInterface;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierService
{
    protected $supplierRepoInterface;

    public function __construct(SupplierRepoInterface $supplierRepoInterface)
    {
        $this->supplierRepoInterface = $supplierRepoInterface;
    }

    public function all()
    {
        return $this->supplierRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->supplierRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->supplierRepoInterface->create($data);
        return $record;
    }

    public function supplierDataTable(Request $request)
    {

        $query = $this->supplierRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->editColumn('name', function ($supplier) {
                return $supplier->name;
            })
            ->editColumn('phone', function ($supplier) {
                return $supplier->phone;
            })
            ->editColumn('address', function ($supplier) {
                return $supplier->address;
            })
            ->editColumn('remark', function ($supplier) {
                return $supplier->remark;
            })
            
            ->addColumn('action', function ($supplier) {
                return view('admin.backend.suppliermanage._action', compact('supplier'))->render();
            })
            ->rawColumns([
                'name',
                'phone',
                'address',
                'remark',
                'action',
            ])
            ->make(true);
    }


    public function update($id, array $data)
    {
        $record = $this->supplierRepoInterface->update($data, $id);
        return $record;
    }


    public function delete($id)
    {
        $record = $this->supplierRepoInterface->find($id);
        $record->delete();
    }
}
