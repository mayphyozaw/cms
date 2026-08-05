<?php

namespace App\Http\Controllers\Backend\EquipmentManage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\ListStoreRequest;
use App\Http\Requests\Equipment\ListUpdateRequest;
use App\Models\BoqCategories;
use App\Models\Equipment;
use App\Models\EquipmentCategory;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::with([
            'equipmentCategory',
            'boqCategory'
        ])
            ->get()
            ->sortBy('equipmentCategory.name');
        return view('admin.backend.equipment-lists.index', compact('equipments'));
    }

    public function create()
    {
        $eqCategories = EquipmentCategory::all();
        $boqCategories = BoqCategories::all();
        return view('admin.backend.equipment-lists.create', compact('eqCategories', 'boqCategories'));
    }

    public function store(ListStoreRequest $request)
    {

        // $lastEquipment = Equipment::latest('id')->first();
        // $nextId = $lastEquipment ? $lastEquipment->id + 1 : 1;
       $nextId = (Equipment::max('id') ?? 0) + 1;
        $eqCode = 'Eq -' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        Equipment::create([
            'equipment_code' => $eqCode,
            'boq_category_id' => $request->boq_category_id,
            'equipment_category_id' => $request->equipment_category_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'serial_no' => $request->serial_no,
            'capacity_spec' => $request->capacity_spec,
            'rate_unit' => $request->rate_unit,
            'ownership_type' => $request->ownership_type,
            'purchase_date' => $request->purchase_date,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return redirect()
            ->route('equipment.lists.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }


    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        $eqCategories = EquipmentCategory::all();
        $boqCategories = BoqCategories::all();
        return view('admin.backend.equipment-lists.edit', compact('equipment', 'eqCategories', 'boqCategories'));
    }

    public function update(ListUpdateRequest $request, $id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->update([
            'boq_category_id' => $request->boq_category_id,
            'equipment_category_id' => $request->equipment_category_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'serial_no' => $request->serial_no,
            'capacity_spec' => $request->capacity_spec,
            'rate_unit' => $request->rate_unit,
            'ownership_type' => $request->ownership_type,
            'purchase_date' => $request->purchase_date,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return redirect()
            ->route('equipment.lists.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }



    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();

        return redirect()
            ->route('equipment.lists.index')
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
