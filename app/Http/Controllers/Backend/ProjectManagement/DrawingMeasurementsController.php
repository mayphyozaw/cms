<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\Drawings;
use App\Models\DrawingTypes;
use App\Models\MeasurementTypes;
use App\Models\Project;
use App\Models\WorkType;
use Illuminate\Http\Request;

class DrawingMeasurementsController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $drawingMeasurementAllData = DrawingMeasurement::with(['workType.measurementType', 'drawing.drawingType'])
            ->get();
        return view('admin.backend.projectmanage.projects.drawing-measurements.index', compact('project', 'drawingMeasurementAllData'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $drawings = Drawings::all();
        $drawing_types = DrawingTypes::all();
        $work_types = WorkType::all();
        $measurement_types = MeasurementTypes::all();
        return view('admin.backend.projectmanage.projects.drawing-measurements.create', compact('project', 'drawings', 'drawing_types', 'work_types', 'measurement_types'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'qty' => 'required',
            'unit_weight' => 'required',
            'coats' => 'required',
        ]);

        $length = $request->length ?? 0;
        $width  = $request->width ?? 0;
        $height = $request->height ?? 0;
        $qty = $request->qty ?? 0;
        $unit_weight = $request->unit_weight ?? 0;
        $coats = $request->coats ?? 0;

        $quantity = 0;

        $measurementType = MeasurementTypes::findOrFail(
            $request->measurement_type_id
        );

        // Volume
        if ($measurementType->symbol == 'V') {
            $quantity = $length * $width * $height;
        }

        // Area
        elseif ($measurementType->symbol == 'A') {

            $quantity = $length * $height;
        }

        // Running Foot
        elseif ($measurementType->symbol == 'L') {
            $quantity = $length;
        }

        // Weight
        elseif ($measurementType->symbol == 'W') {

            $quantity = $unit_weight * $qty;
        }
        //Coats
        elseif ($measurementType->symbol == 'C') {

            $quantity = $length * $height * $coats;
        }
        DrawingMeasurement::create([
            'project_id' => $project->id,
            'drawing_id' => $request->drawing_id,
            'work_type_id' => $request->work_type_id,
            'measurement_type_id' => $request->measurement_type_id,
            'length' => $length,
            'width' => $width,
            'height' => $height,
            'qty' => $qty,
            'unit_weight' => $unit_weight,
            'coats' => $coats,
            'quantity' => $quantity,
            'unit' => $request->unit,
            'remarks' => $request->remarks,
        ]);

        // return $drawing_measurements;

        return redirect()
            ->route('projectmanage.projects.drawing-measurements.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {
        // $drawing_measurement = DrawingMeasurement::findOrFail($id);
        // $drawing_measurement = DrawingMeasurement::with([
        //     'measurementType',
        //     'drawing',
        //     'workType'
        // ])->findOrFail($id);
        $drawing_measurement = DrawingMeasurement::with('measurementType')
            ->findOrFail($id);
        $drawings = Drawings::all();
        $drawing_types = DrawingTypes::all();
        $work_types = WorkType::all();
        $measurement_types = MeasurementTypes::all();
        $project->load('client');
        return view('admin.backend.projectmanage.projects.drawing-measurements.edit', compact('project', 'drawing_measurement', 'drawings', 'drawing_types', 'work_types', 'measurement_types'));
    }

    public function update(Request $request, Project $project, $id)
    {
        $drawing_measurement = DrawingMeasurement::findOrFail($id);
        $quantity = 0;

        $measurementType = MeasurementTypes::findOrFail(
            $request->measurement_type_id
        );

        // Volume
        if ($measurementType->symbol == 'V') {

            $quantity = $request->length * $request->width * $request->height;
        }

        // Area
        elseif ($measurementType->symbol == 'A') {

            $quantity = $request->length * $request->height;
        }

        // Length
        elseif ($measurementType->symbol == 'L') {

            $quantity = $request->length;
        }

        // Weight
        elseif ($measurementType->symbol == 'W') {

            $quantity = $request->unit_weight * $request->qty;
        }

        // Paint / Coats
        elseif ($measurementType->symbol == 'C') {

            $quantity = $request->length * $request->height * $request->coats;
        }
        $drawing_measurement->update([
            'project_id' => $project->id,
            'drawing_id' => $request->drawing_id,
            'work_type_id' => $request->work_type_id,
            'measurement_type_id' => $request->measurement_type_id,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'qty' => $request->qty,
            'unit_weight' => $request->unit_weight,
            'coats' => $request->coats,
            'quantity' => $quantity,
            'remark' => $request->remark,
        ]);
        return redirect()
            ->route('projectmanage.projects.drawing-measurements.index', $project->id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $drawing_measurement = DrawingMeasurement::findOrFail($id);

        $drawing_measurement->delete();

        return redirect()
            ->route('projectmanage.projects.drawing-measurements.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }

    public function getDrawing(Request $request)
    {
        $drawing = Drawings::find($request->drawing_id);

        if (!$drawing) {
            return response()->json(['error' => 'Drawings not found'], 404);
        }

        return response()->json([
            'drawing_type_id' => $drawing->drawing_type_id
        ]);
    }

    public function getWorkType(Request $request)
    {
        $work_type = WorkType::with('measurementType')
            ->find($request->work_type_id);
        if (!$work_type) {
            return response()->json(['error' => 'Work Type not found'], 404);
        }

        return response()->json([
            'unit' => $work_type->unit,

            'measurement_type_id' => $work_type->measurement_type_id,

            'measurement_type_name' => $work_type->measurementType->name ?? '',

            'formula' => $work_type->measurementType->formula ?? ''
        ]);
    }
}
