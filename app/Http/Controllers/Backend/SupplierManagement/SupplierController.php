<?php

namespace App\Http\Controllers\Backend\SupplierManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\SupplierStoreRequest;
use App\Http\Requests\Supplier\SupplierUpdateRequest;
use App\Models\Supplier;
use App\Services\ResponseService;
use App\Services\SupplierService;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
   protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        $suppliers = $this->supplierService->all();
        return view('admin.backend.suppliermanage.index', compact('suppliers'));
    }
    
    public function create()
    {
        return view('admin.backend.suppliermanage.create');
    }

    public function supplierDataTable(Request $request)
    {
        return $this->supplierService->supplierDataTable($request);
    }


    public function store(SupplierStoreRequest $request)
    {
        $supplierData = [
            'name' => $request->name,
            'phone' => $request->phone ?? '',
            'address' => $request->address ?? '',
            'remark' => $request->remark ?? '',
        ];
        $this->supplierService->create($supplierData);
        return redirect()->route('suppliermanage.supplier.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.backend.suppliermanage.edit', compact('supplier'));
    }

    public function update(SupplierUpdateRequest $request, $id)
    {
        $supplierData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'remark' => $request->remark,
        ];
        $this->supplierService->update($id, $supplierData);

        return redirect()->route('suppliermanage.supplier.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    }

    public function destroy($id)
    {
         try {
            $this->supplierService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }

    
}
