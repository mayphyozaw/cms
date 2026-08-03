<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\LaborMappings;
use App\Models\LaborRequirements;
use App\Models\LaborType;
use App\Models\Project;
use Illuminate\Http\Request;

class LaborRequirementController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $laborRequirements = LaborRequirements::with([
            'drawingMeasurement.drawing',
            'drawingMeasurement.category',
            'laborType',
            'laborMapping'
        ])->get();

        $laborTypes = LaborType::all();

        $groupedRequirements = $laborRequirements->groupBy(
            fn($item) => $item->drawingMeasurement?->category?->id
        );
        return view('admin.backend.projectmanage.projects.labor-requirements.index', compact('project', 'laborRequirements', 'groupedRequirements', 'laborTypes'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $drawingMeasurements = DrawingMeasurement::all();
        $laborMappings  = LaborMappings::with('laborType')->get();
        return view('admin.backend.projectmanage.projects.labor-requirements.create', compact('project', 'drawingMeasurements', 'laborMappings'));
    }

    public function store(Request $request, Project $project)
    {


        $drawingMeasurement = DrawingMeasurement::findOrFail($request->drawing_measurement_id);
        $laborMapping = LaborMappings::findOrFail($request->labor_mapping_id);

        $raw_quantity = $drawingMeasurement->quantity;
        $productivity = $laborMapping->productivity ?? 0;
        $required_qty = $productivity > 0
            ? $raw_quantity / $productivity
            : 0;

        LaborRequirements::create([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'labor_mapping_id'       => $request->labor_mapping_id,
            'labor_type_id'          => $laborMapping->labor_type_id,
            'raw_quantity'           => $raw_quantity,
            'required_qty'           => $required_qty,
            'unit'                   => $laborMapping->unit,
            'status'                 => $request->status,
            'remark'                 => $request->remark,
        ]);


        return redirect()
            ->route('projectmanage.projects.labor-requirements.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {
        $laborRequirement = LaborRequirements::with('drawingmeasurement', 'laborMapping','laborType')->findOrFail($id);
        $project->load('client');
        $drawingMeasurements = DrawingMeasurement::all();
        $laborMappings  = LaborMappings::with('laborType')->get();
        return view('admin.backend.projectmanage.projects.labor-requirements.edit', compact('project', 'drawingMeasurements', 'laborMappings','laborRequirement'));
    }

    public function update(Request $request, Project $project, $id)
    {

        $laborRequirement = LaborRequirements::findOrFail($id);
        $drawingMeasurement = DrawingMeasurement::findOrFail($request->drawing_measurement_id);
        $laborMapping = LaborMappings::findOrFail($request->labor_mapping_id);

        $raw_quantity = $drawingMeasurement->quantity;
        $productivity = $laborMapping->productivity ?? 0;
        $required_qty = $productivity > 0
            ? $raw_quantity / $productivity
            : 0;

        $laborRequirement->update([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'labor_mapping_id'       => $request->labor_mapping_id,
            'labor_type_id'          => $laborMapping->labor_type_id,
            'raw_quantity'           => $raw_quantity,
            'required_qty'           => $required_qty,
            'unit'                   => $laborMapping->unit,
            'status'                 => $request->status,
            'remark'                 => $request->remark,
        ]);


        return redirect()
            ->route('projectmanage.projects.labor-requirements.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
}
