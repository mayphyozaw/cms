<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\Equipment;
use App\Models\EquipmentMappings;
use App\Models\EquipmentRequirements;
use App\Models\Project;
use Illuminate\Http\Request;

class EquipmentRequirementsController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $equipmentRequirements = EquipmentRequirements::with([
            'drawingMeasurement.drawing',
            'drawingMeasurement.category',
            'equipment.equipmentCategory',
            'equipmentMapping'
        ])->get();

        $equipments = Equipment::all();

        $groupedRequirements = $equipmentRequirements->groupBy(
            fn($item) => $item->drawingMeasurement?->category?->id
        );
        return view('admin.backend.projectmanage.projects.equipment-requirements.index', compact('project', 'equipmentRequirements', 'groupedRequirements', 'equipments'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $drawingMeasurements = DrawingMeasurement::all();
        $equipmentMappings  = EquipmentMappings::with('equipment')->get();
        return view('admin.backend.projectmanage.projects.equipment-requirements.create', compact('project', 'drawingMeasurements', 'equipmentMappings'));
    }

    public function store(Request $request, Project $project)
    {


        $drawingMeasurement = DrawingMeasurement::findOrFail($request->drawing_measurement_id);
        $equipmentMapping = EquipmentMappings::findOrFail($request->equipment_mapping_id);

        $measurement_qty = $drawingMeasurement->quantity;
        $productivity = $equipmentMapping->productivity ?? 0;
        $required_qty = $productivity > 0
            ? $measurement_qty / $productivity
            : 0;

        EquipmentRequirements::create([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'equipment_mapping_id'   => $request->equipment_mapping_id,
            'equipment_id'           => $equipmentMapping->equipment_id,
            'measurement_qty'        => $measurement_qty,
            'productivity'           => $productivity,
            'required_qty'           => $required_qty,
            'productivity_unit'      => $equipmentMapping->productivity_unit,
            'status'                 => $request->status,
            'remark'                 => $request->remark,
        ]);


        return redirect()
            ->route('projectmanage.projects.equipment-requirements.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {
        $equipmentRequirement = EquipmentRequirements::with('drawingmeasurement', 'equipmentMapping','equipment')->findOrFail($id);
        $project->load('client');
        $drawingMeasurements = DrawingMeasurement::all();
        $equipmentMappings  = EquipmentMappings::with('equipment')->get();
        return view('admin.backend.projectmanage.projects.labor-requirements.edit', compact('project', 'drawingMeasurements', 'equipmentMappings','equipmentRequirement'));
    }

    public function update(Request $request, Project $project, $id)
    {

        $equipmentRequirement = EquipmentRequirements::findOrFail($id);
        $drawingMeasurement = DrawingMeasurement::findOrFail($request->drawing_measurement_id);
        $equipmentMapping = EquipmentMappings::findOrFail($request->equipment_mapping_id);

        $measurement_qty = $drawingMeasurement->quantity;
        $productivity = $laborMapping->productivity ?? 0;
        $required_qty = $productivity > 0
            ? $measurement_qty / $productivity
            : 0;

        $equipmentRequirement->update([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'equipment_mapping_id'   => $request->equipment_mapping_id,
            'equipment_id'           => $equipmentMapping->equipment_id,
            'measurement_qty'        => $measurement_qty,
            'required_qty'           => $required_qty,
            'productivity_unit'      => $equipmentMapping->productivity_unit,
            'status'                 => $request->status,
            'remark'                 => $request->remark,
        ]);


        return redirect()
            ->route('projectmanage.projects.equipment-requirements.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
}
