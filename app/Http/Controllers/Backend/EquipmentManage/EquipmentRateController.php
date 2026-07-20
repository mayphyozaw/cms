<?php

namespace App\Http\Controllers\Backend\EquipmentManage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\EquipmentRateStoreRequest;
use App\Http\Requests\Equipment\EquipmentRateUpdateRequest;
use App\Models\Equipment;
use App\Models\EquipmentRate;
use Illuminate\Http\Request;

class EquipmentRateController extends Controller
{
    public function index()
    {
        $eqrates = EquipmentRate::with('equipment')->get();
        return view('admin.backend.equipment-rate.index', compact('eqrates'));
    }

    public function create()
    {
        $equipments = Equipment::all();
        return view('admin.backend.equipment-rate.create', compact('equipments'));
    }

    public function store(EquipmentRateStoreRequest $request)
    {

        
        EquipmentRate::create([
            'equipment_id' => $request->equipment_id,
            'rate' => $request->rate,
            'effective_date' => $request->effective_date,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return redirect()
            ->route('equipment.rate.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $eqrate = EquipmentRate::findOrFail($id);
        $equipments = Equipment::all();

        return view('admin.backend.equipment-rate.edit',compact('eqrate', 'equipments')
        );
    }

    public function update(EquipmentRateUpdateRequest $request, $id)
    {
        $eqrate = EquipmentRate::findOrFail($id);

        $eqrate->update([
            'equipment_id' => $request->equipment_id,
            'rate' => $request->rate,
            'effective_date' => $request->effective_date,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return redirect()
            ->route('equipment.rate.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy($id)
    {
        $eqrate = EquipmentRate::findOrFail($id);
        $eqrate->delete();

        return redirect()
            ->route('equipment.rate.index')
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
