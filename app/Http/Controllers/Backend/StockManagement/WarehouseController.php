<?php

namespace App\Http\Controllers\Backend\StockManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockManagement\WarehouseStoreRequest;
use App\Http\Requests\StockManagement\WarehouseUpdateRequest;
use App\Models\Warehouse;
use App\Services\ResponseService;
use App\Services\WarehouseService;
use Exception;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
   protected $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function index()
    {
        $warehouses = $this->warehouseService->all();
        return view('admin.backend.warehouse.index', compact('warehouses'));
    }
    
    public function create()
    {
        return view('admin.backend.warehouse.create');
    }

    public function warehouseDataTable(Request $request)
    {
        return $this->warehouseService->warehouseDataTable($request);
    }


    public function store(WarehouseStoreRequest $request)
    {
        $supplierData = [
            'name' => $request->name,
            'address' => $request->address ?? '',
            'remark' => $request->remark ?? '',
        ];
        $this->warehouseService->create($supplierData);
        return redirect()->route('warehouse.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return view('admin.backend.warehouse.edit', compact('warehouse'));
    }

    public function update(WarehouseUpdateRequest $request, $id)
    {
        $warehouseData = [
            'name' => $request->name,
            'address' => $request->address,
            'remark' => $request->remark,
        ];
        $this->warehouseService->update($id, $warehouseData);

        return redirect()->route('warehouse.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    }

    public function destroy($id)
    {
         try {
            $this->warehouseService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }

    
}

