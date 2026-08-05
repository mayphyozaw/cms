<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\Equipment;
use App\Models\EquipmentCategory;
use App\Models\EquipmentMappings;
use App\Models\Project;
use Illuminate\Http\Request;

class EquipmentMappingController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $equipmentMappings = EquipmentMappings::with('equipment', 'equipmentCategory', 'drawingmeasurement.drawing')
            ->get();
        return view('admin.backend.projectmanage.projects.equipment-mappings.index', compact('project', 'equipmentMappings'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $equipments = Equipment::all();
        $equipmentCategories = EquipmentCategory::all();
        $drawingMeasurements = DrawingMeasurement::all();
        return view('admin.backend.projectmanage.projects.equipment-mappings.create', compact('project', 'equipments', 'equipmentCategories', 'drawingMeasurements'));
    }

    public function store(Request $request, Project $project)
    {

        EquipmentMappings::create([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'equipment_id'          => $request->equipment_id,
            'equipment_category_id' => $request->equipment_category_id,
            'productivity_unit'     => $request->productivity_unit,
            'productivity'           => $request->productivity,
            'remark'                 => $request->remark,
        ]);

        return redirect()
            ->route('projectmanage.projects.equipment-mappings.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }


    public function edit(Project $project, $id)
    {
        $equipmentMapping = EquipmentMappings::with([
            'equipment.equipmentCategory'
        ])->findOrFail($id);
        $project->load('client');
        $equipments = Equipment::all();
        $equipmentCategories = EquipmentCategory::all();
        $drawingMeasurements = DrawingMeasurement::all();
        return view('admin.backend.projectmanage.projects.equipment-mappings.edit', compact('project', 'equipments', 'equipmentCategories', 'drawingMeasurements', 'equipmentMapping'));
    }


    public function update(Request $request, Project $project, $id)
    {
        $equipmentMapping = EquipmentMappings::with([
            'equipment.equipmentCategory', 'drawingMeasurement'
        ])->findOrFail($id);
        $equipment = Equipment::findOrFail($request->equipment_id);
        $project->load('client');
        $equipmentMapping->update([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'equipment_id'          => $request->equipment_id,
            'equipment_category_id' => $equipment->equipment_category_id,
            'productivity_unit'     => $request->productivity_unit,
            'productivity'           => $request->productivity,
            'remark'                 => $request->remark,
        ]);

        return redirect()
            ->route('projectmanage.projects.equipment-mappings.index', $project->id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $equipmentMapping = EquipmentMappings::findOrFail($id);
        $equipmentMapping->delete();

        return redirect()
            ->route('projectmanage.projects.equipment-mappings.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }

    public function getEquipmentCategory(Request $request)
    {
        $equipmentCategory =
            EquipmentCategory::findOrFail(
                $request->equipment_category_id
            );

        return response()->json([

            'equipment_category_id' => $equipmentCategory->id,

            'name' => $equipmentCategory->name,

        ]);
    }
    public function getEquipment(Request $request)
    {

        $equipment = Equipment::with('equipmentCategory')
            ->findOrFail($request->equipment_id);

        return response()->json([

            'equipment_id' => $equipment->id,

            'equipment_category_id' => $equipment->equipment_category_id,

            'equipment_category_name' => $equipment->equipmentCategory?->name,

            'name' => $equipment->name,

        ]);
    }


    public function getEquipmentMapping(Request $request)
    {
        $equipmentMapping = EquipmentMappings::with([
            'equipment.equipmentCategory',
            'drawingMeasurement'
        ])->find($request->equipment_mapping_id);


        return response()->json([
            'id'                     => $equipmentMapping->id,
            'drawing_measurement_id' => $equipmentMapping->drawing_measurement_id,
            'equipment_id'           => $equipmentMapping->equipment_id,
            'productivity'           => $equipmentMapping->productivity,
            'productivity_unit'      => $equipmentMapping->productivity_unit,
            'required_unit'          => explode('/', $equipmentMapping->productivity_unit)[1] ?? '',
        ]);
    }
}
