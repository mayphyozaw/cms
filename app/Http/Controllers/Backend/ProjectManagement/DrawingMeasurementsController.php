<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\Drawings;
use App\Models\DrawingTypes;
use App\Models\MeasurementCategories;
use App\Models\MeasurementTypes;
use App\Models\Project;
use App\Models\WorkType;
use Illuminate\Http\Request;

class DrawingMeasurementsController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $drawingMeasurementAllData = DrawingMeasurement::with(['workType.measurementType', 'drawing.drawingType', 'category'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.backend.projectmanage.projects.drawing-measurements.index', compact('project', 'drawingMeasurementAllData'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $drawings = Drawings::all();
        $drawing_types = DrawingTypes::all();
        // $work_types = WorkType::all();
        // $measurement_types = MeasurementTypes::all();
        $categories = MeasurementCategories::all();
        return view('admin.backend.projectmanage.projects.drawing-measurements.create', compact('project', 'drawings', 'drawing_types', 'categories'));
    }

    public function store(Request $request, Project $project)
    {
        // return $request->all();
        $request->validate([
            'length' => 'required|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'nos' => 'nullable|numeric|min:0',

            'thickness' => 'nullable',
            'unit_weight' => 'nullable|numeric|min:0',
            'coats' => 'nullable|numeric|min:0',

            'drawing_id' => 'required|exists:drawings,id',
            'measurement_categories_id' => 'required|exists:measurement_categories,id',
        ]);

        $length = $request->length ?? 0;
        $width  = $request->width ?? 0;
        $height = $request->height ?? 0;
        $nos = $request->nos ?? 0;
        $unit_weight = $request->unit_weight ?? 0;
        $coats = $request->coats ?? 0;
        $thickness = $request->thickness;

        if ($request->thickness_unit == 'inch') {

            $thickness_ft = $thickness / 12;
        } else {

            $thickness_ft = $thickness;
        }


        $quantity = 0;

        $category = MeasurementCategories::findOrFail(
            $request->measurement_categories_id
        );

        switch ($category->formula_types) {

            case 'volume':
                $quantity = $length * $width * $height;
                break;

            case 'excavation_volume':
            case 'pcc_1:3:6':
            case 'rcc_footing':
            case 'rcc_column':
                $quantity = $nos * $length * $width * $height;
                break;

            case 'area':
            case 'screed_area':
            case 'concrete_slab_area':
            case 'mortar_bed_area':
                $quantity = $length * $width;
                break;

            case 'wall_area':
            case 'brick_wall_area':
                $quantity = $length * $height;
                break;

            case 'coats_area':
                $quantity = $length * $height * $coats;
                break;


            case 'painting_area':
            case 'plaster_area':
                $quantity = 2 * ($length + $width) * $height;
                break;

            case 'plaster_volume':
                $quantity = 2 * ($length + $width) * $height * $thickness_ft;
                break;


            case 'concrete_slab_volume':
                $quantity = $length * $width * $thickness_ft;
                 break;

            case 'steel_linear':
            case 'steel_handrail_linear':
                $quantity = $length;
                break;

            case 'weight':
                $quantity = $length * $unit_weight;
                break;
        }
        

            $drawingMeasurements = DrawingMeasurement::create([
                'project_id' => $project->id,
                'measurement_categories_id' => $request->measurement_categories_id,
                'drawing_id' => $request->drawing_id,
                'nos' => $nos,
                'length' => $length,
                'width' => $width,
                'height' => $height,
                'thickness' => $thickness,
                'thickness_unit' => $request->thickness_unit,
                'unit_weight' => $unit_weight,
                'coats' => $coats,
                'quantity' => $quantity,
                'unit' => $request->unit,
                'remark' => $request->remark,


            ]);

            

            return redirect()
                ->route('projectmanage.projects.drawing-measurements.index', $project->id)
                ->with([
                    'message' => 'Successfully created',
                    'alert-type' => 'success'
                ]);
        
    }

    public function edit(Project $project, $id)
    {

        $drawing_measurement = DrawingMeasurement::with('category')
            ->findOrFail($id);
        $thickness_ft = $drawing_measurement->thickness_unit == 'inch'
            ? $drawing_measurement->thickness / 12
            : $drawing_measurement->thickness;

        $drawings = Drawings::all();
        $drawing_types = DrawingTypes::all();
        $work_types = WorkType::all();
        $measurement_types = MeasurementTypes::all();
        $categories = MeasurementCategories::all();
        $project->load('client');
        return view('admin.backend.projectmanage.projects.drawing-measurements.edit', compact('project', 'drawing_measurement', 'drawings', 'drawing_types', 'work_types', 'measurement_types', 'categories', 'thickness_ft'));
    }

    public function update(Request $request, Project $project, $id)
    {
        $drawing_measurement = DrawingMeasurement::findOrFail($id);
        $quantity = 0;

        $category = MeasurementCategories::findOrFail(
            $request->measurement_categories_id
        );

        if ($request->thickness_unit == 'inch') {

            $thickness_ft = $request->thickness / 12;
        } else {

            $thickness_ft = $request->thickness;
        }

        switch ($category->formula_types) {

            case 'volume':
                $quantity = $request->length * $request->width * $request->height;
                break;
            
            case 'excavation_volume':
            case 'pcc_1:3:6':
            case 'rcc_footing':
            case 'rcc_column':
                $quantity = $request->nos * $request->length * $request->width * $request->height;
                break;

            case 'area':
            case 'screed_area':
            case 'concrete_slab_area':
            case 'mortar_bed_area':
                $quantity = $request->length * $request->width;
                break;

            case 'wall_area':
            case 'brick_wall_area':
                $quantity = $request->length * $request->height;
                break;

            case 'coats_area':
                $quantity = $request->length * $request->height * $request->coats;
                break;


            case 'painting_area':
            case 'plaster_area':
                $quantity = 2 * ($request->length + $request->width) * $request->height;
                break;

            case 'plaster_volume':
                $quantity = (2 * ($request->length + $request->width) * $request->height) * $thickness_ft;
                break;

            case 'steel_linear':
            case 'steel_handrail_linear':
                $quantity = $request->length;
                break;

            case 'weight':
                $quantity = $request->length * $request->unit_weight;
                break;
        }
        $drawing_measurement->update([
            'project_id' => $project->id,
            'drawing_id' => $request->drawing_id,
            'work_type_id' => $request->work_type_id,
            'measurement_categories_id' => $request->measurement_categories_id,
            'measurement_type_id' => $request->measurement_type_id,
            'nos' => $request->nos,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'thickness' => $request->thickness,
            'thickness_unit' => $request->thickness_unit,
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

    public function getDrawingMeasurement(Request $request)
    {
        $drawingMeasurement = DrawingMeasurement::find($request->drawing_measurement_id);

        if (!$drawingMeasurement) {
            return response()->json(['error' => 'Drawing Measurement not found'], 404);
        }

        return response()->json([
            'id'           => $drawingMeasurement->id,
            'nos'       => $drawingMeasurement->nos,
            'length'       => $drawingMeasurement->length,
            'width'        => $drawingMeasurement->width,
            'height'       => $drawingMeasurement->height,
            'unit_weight'  => $drawingMeasurement->unit_weight,
            'quantity'     => $drawingMeasurement->quantity,
            'unit'         => $drawingMeasurement->unit,
            'formula'      => $drawingMeasurement->formula,
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
