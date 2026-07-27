<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\DrawingMeasurementDetail;
use App\Models\Drawings;
use App\Models\DrawingTypes;
use App\Models\MeasurementCategories;
use App\Models\Project;
use App\Services\Measurement\MeasurementCalculationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrawingMeasurementDetailController extends Controller
{


    public function index(Project $project, DrawingMeasurement $drawingMeasurement)
    {

        $project->load('client');

        $drawingMeasurement->load('details');


        return view('admin.backend.projectmanage.projects.drawing-measurement-detail.index',
            compact('project', 'drawingMeasurement')
        );
    }

    public function create(Project $project, DrawingMeasurement $drawingMeasurement)
    {
        $project->load('client');
        $details = DrawingMeasurementDetail::with('drawingMeasurement')->get();
        $measurement = DrawingMeasurement::with(['drawing.drawingType', 'category'])->get();
        $drawings = Drawings::all();
        $drawing_types = DrawingTypes::all();
        $categories = MeasurementCategories::all();
        return view('admin.backend.projectmanage.projects.drawing-measurement-detail.create',
            compact('project', 'drawingMeasurement', 'details', 'drawings', 'drawing_types', 'categories', 'measurement')
        );
    }
    

    public function store(Request $request,Project $project,MeasurementCalculationService $measurementService,DrawingMeasurement $drawingMeasurement) 
    {

        $totalQty = 0;

        $category = MeasurementCategories::findOrFail(
            $drawingMeasurement->measurement_categories_id
        );

        DB::transaction(function () use (
            $request,
            $drawingMeasurement,
            $measurementService,
            $category,
            &$totalQty
        ) {

            foreach ($request->title as $index => $title) {

                $thickness = $request->thickness[$index] ?? 0;

                $thicknessFt =
                    ($request->thickness_unit[$index] ?? 'ft') == 'inch'
                    ? $thickness / 12
                    : $thickness;

                $rowData = [
                    'nos' => $request->nos[$index] ?? 0,
                    'length' => $request->length[$index] ?? 0,
                    'width' => $request->width[$index] ?? 0,
                    'height' => $request->height[$index] ?? 0,
                    'coats' => $request->coats[$index] ?? 0,
                    'unit_weight' => $request->unit_weight[$index] ?? 0,
                    'thickness_ft' => $thicknessFt,
                ];

                $grossQty = $measurementService->calculate(
                    $category->formula_types,
                    $rowData
                );

                $deduction = $request->deduction[$index] ?? 0;

                $netQty = $grossQty - $deduction;

                $totalQty += $netQty;

                DrawingMeasurementDetail::create([
                    'drawing_measurement_id' => $drawingMeasurement->id,

                    'description' => $title,

                    'detail_no' => $index + 1,

                    'nos' => $request->nos[$index] ?? 0,
                    'length' => $request->length[$index] ?? 0,
                    'width' => $request->width[$index] ?? 0,
                    'height' => $request->height[$index] ?? 0,
                    'thickness' => $request->thickness[$index] ?? 0,
                    'thickness_unit' => $request->thickness_unit[$index] ?? 'ft',
                    'coats' => $request->coats[$index] ?? 0,
                    'unit_weight' => $request->unit_weight[$index] ?? 0,
                    'gross_quantity' => $grossQty,
                    'deduction' => $deduction,
                    'net_quantity' => $netQty,
                    'unit' => $category->unit,
                ]);
            }

            $drawingMeasurement->update([
                'quantity' => $totalQty,
                'unit'     => $category->unit,
            ]);
        });

        return redirect()
            ->route(
                'projectmanage.projects.drawing-measurement-detail.index',
                [$project->id, $drawingMeasurement->id]
            )
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
}
