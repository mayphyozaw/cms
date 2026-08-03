<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\LaborMappings;
use App\Models\LaborType;
use App\Models\Project;
use Illuminate\Http\Request;

class LaborMappingController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $laborMappings = LaborMappings::with('laborType', 'drawingmeasurement.drawing')
            ->get();
        return view('admin.backend.projectmanage.projects.labor-mappings.index', compact('project', 'laborMappings'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $laborTypes = LaborType::all();
        $drawingMeasurements = DrawingMeasurement::all();
        return view('admin.backend.projectmanage.projects.labor-mappings.create', compact('project', 'laborTypes', 'drawingMeasurements'));
    }

    public function store(Request $request, Project $project)
    {


        LaborMappings::create([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'labor_type_id'          => $request->labor_type_id,
            'unit'                   => $request->unit,
            'productivity'           => $request->productivity,
            'remark'                 => $request->remark,
        ]);

        return redirect()
            ->route('projectmanage.projects.labor-mappings.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {
        $laborMapping = LaborMappings::with('drawingMeasurement', 'laborType')->findOrFail($id);
        $project->load('client');
        $drawingMeasurements = DrawingMeasurement::all();
        $laborTypes = LaborType::all();
        return view('admin.backend.projectmanage.projects.labor-mappings.edit', compact('laborMapping', 'project', 'laborTypes', 'drawingMeasurements'));
    }
    public function update(Request $request, Project $project, $id)
    {
        $laborMapping = LaborMappings::with('drawingMeasurement', 'laborType')->findOrFail($id);
        $project->load('client');
        $laborMapping->update([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'labor_type_id'          => $request->labor_type_id,
            'unit'                   => $request->unit,
            'productivity'           => $request->productivity,
            'remark'                 => $request->remark,
        ]);



        return redirect()
            ->route(
                'projectmanage.projects.labor-mappings.index',
                $project->id
            )
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $laborMapping = LaborMappings::findOrFail($id);
        $laborMapping->delete();

        return redirect()
            ->route('projectmanage.projects.labor-mappings.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }

    public function getLaborMapping(Request $request)
    {
        $laborMapping = LaborMappings::with([
            'laborType',
            'drawingMeasurement'
        ])->find($request->labor_mapping_id);



        return response()->json([
            'id'                     => $laborMapping->id,
            'drawing_measurement_id' => $laborMapping->drawing_measurement_id,
            'labor_type_id'          => $laborMapping->labor_type_id,
            'productivity'           => $laborMapping->productivity,
            'unit'                   => $laborMapping->unit,
        ]);
    }
}
