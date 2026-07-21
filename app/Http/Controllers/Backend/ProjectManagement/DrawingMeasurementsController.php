<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\DrawingMeasurementDetail;
use App\Models\Drawings;
use App\Models\DrawingTypes;
use App\Models\MeasurementCategories;
use App\Models\MeasurementTypes;
use App\Models\Project;
use App\Models\WorkType;
use App\Services\Measurement\MeasurementCalculationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrawingMeasurementsController extends Controller
{
    public function index(Project $project)
    {
        
        $project->load('client');
        
        $drawingMeasurementAllData = DrawingMeasurement::with(['drawing.drawingType', 'category'])->get();
        // return $drawingMeasurementAllData;
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
    // id
    // project_id
    // drawing_id
    // measurement_no
    // measurement_date
    // drawing_type_id
    // total_quantity
    // unit
    // status
    // remarks
    // created_by
    // created_at
    // updated_at
    public function storebackup(Request $request, Project $project, MeasurementCalculationService $measurementService)
    {
        return $request->all();

        $request->validate([
            'drawing_id' => 'required|array',
            'drawing_id.*' => 'exists:drawings,id',

            'measurement_categories_id' => 'required|array',
            'measurement_categories_id.*' => 'exists:measurement_categories,id',

            'rows' => 'required|array|min:1',
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

        $category = MeasurementCategories::findOrFail(
            $request->measurement_categories_id[0]
        );

        $unit = collect($request->rows)->first()['unit'] ?? '';

        try {
            DB::transaction(function () use (
                $request,
                $project,
                $measurementService,
                $category,
                $thickness_ft,
                $unit,
            ) {
                $measurement = DrawingMeasurement::create([
                    'project_id' => $project->id,
                    'measurement_categories_id' => $request->measurement_categories_id[0],
                    'drawing_id' => $request->drawing_id[0],
                    'nos' => $request->nos,
                    'length' => $request->length,
                    'width' => $request->width,
                    'height' => $request->height,
                    'thickness' => $request->thickness,
                    'thickness_unit' => $request->thickness_unit,
                    'unit_weight' => $request->unit_weight,
                    'coats' => $request->coats,
                    'unit' => $unit,
                    'remark' => $request->remark,

                ]);

                $totalQty = 0;
                foreach ($request->rows as $row) {

                    $rowData = [
                        'nos' => $row['nos'] ?? 0,
                        'length' => $row['length'] ?? 0,
                        'width' => $row['width'] ?? 0,
                        'height' => $row['height'] ?? 0,
                        'coats' => $request->coats ?? 0,
                        'unit_weight' => $request->unit_weight ?? 0,
                        'thickness_ft' => $thickness_ft,
                    ];


                    $grossQty = $measurementService->calculate(
                        $category->formula_types,
                        $rowData
                    );


                    $netQty = $grossQty - ($row['deduction'] ?? 0);
                    $totalQty += $netQty;

                    $measurement->details()->create([
                        'drawing_measurement_id' => $measurement->id,
                        'description' => $row['title'],
                        'detail_no' => $row['detail_no'],
                        'nos' => $row['nos'],
                        'length' => $row['length'],
                        'width' => $row['width'],
                        'height' => $row['height'],
                        'gross_quantity' => $grossQty,
                        'deduction' => $row['deduction'] ?? 0,
                        'net_quantity' => $netQty,
                        'unit' => $row['unit'],
                    ]);
                }
                $measurement->update([
                    'quantity' => $totalQty,
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }

        return redirect()
            ->route('projectmanage.projects.drawing-measurements.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }


    public function store(Request $request, Project $project)
    {
        
        $measurement = DrawingMeasurement::create([
            'project_id' => $project->id,
            'measurement_categories_id' => $request->measurement_categories_id,
            'drawing_id' => $request->drawing_id,
            'quantity' => 0,
            'remark' => $request->remark,
        ]);

        return redirect()->route(
            'projectmanage.projects.drawing-measurement-detail.index',
            [$project->id, $measurement->id]
        );
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

    public function update(Request $request, Project $project, $id, MeasurementCalculationService $measurementService)
    {
        $drawing_measurement = DrawingMeasurement::findOrFail($id);


        $category = MeasurementCategories::findOrFail(
            $request->measurement_categories_id
        );

        if ($request->thickness_unit == 'inch') {

            $thickness_ft = $request->thickness / 12;
        } else {

            $thickness_ft = $request->thickness;
        }



        $data = [
            'nos' => $request->nos,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'coats' => $request->coats,
            'unit_weight' => $request->unit_weight,
            'thickness_ft' => $thickness_ft,
        ];

        // $service = new MeasurementCalculationService();


        $calculatedQty = $measurementService->calculate($category->formula_types, $data);

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
            'quantity' => $calculatedQty,
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
