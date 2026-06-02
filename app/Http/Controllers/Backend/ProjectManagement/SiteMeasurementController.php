<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\Drawings;
use App\Models\MeasurementCategories;
use App\Models\Project;
use App\Models\SiteMeasurements;
use Illuminate\Http\Request;

class SiteMeasurementController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        // $siteMeasurementAllData = SiteMeasurements::with(['drawing', 'measurementCategory'])
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        $siteMeasurementAllData = SiteMeasurements::with([
            'drawing',
            'measurementCategory'
        ])
            ->where('project_id', $project->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.backend.projectmanage.projects.site-measurements.index', compact('project', 'siteMeasurementAllData'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $site_measurement = SiteMeasurements::with([
            'drawingMeasurement',
            'drawing'
        ])->get();
        $drawingMeasurements = DrawingMeasurement::with([
            'drawing',
            'measurementCategory'
        ])->get();
        $categories = MeasurementCategories::all();
        return view('admin.backend.projectmanage.projects.site-measurements.create', compact('project', 'categories', 'drawingMeasurements', 'site_measurement'));
    }

    public function store(Request $request, Project $project)
    {


        $request->validate([
            'rate'        => 'required|numeric|min:0',
            'drawing_measurement_id'  => 'required|exists:drawing_measurements,id',
            'category_id' => 'required|exists:measurement_categories,id',
            'drawing_id' => 'required|exists:drawings,id',

        ]);

        $length = $request->length ?? 0;
        $width  = $request->width ?? 0;
        $height = $request->height ?? 0;
        $unit_weight = $request->unit_weight ?? 0;
        $rate = $request->rate ?? 0;

        $quantity = 0;


        $category = MeasurementCategories::findOrFail($request->category_id);

        switch ($category->formula_types) {

            case 'volume':
                $quantity = $length * $width * $height;
                break;

            case 'area':
                $quantity = $length * $width;
                break;

            case 'wall_area':
                $quantity = $length * $height;
                break;

            case 'painting_area':
                $quantity = 2 * ($length + $width) * $height;
                break;

            case 'steel_linear':
            case 'steel_handrail_linear':
                $quantity = $length;
                break;

            case 'weight':
                $quantity = $length * $unit_weight;
                break;
        }


        $total = $rate * $quantity;

        SiteMeasurements::create([
            'project_id' => $project->id,
            'drawing_id' => $request->drawing_id,
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'category_id' => $request->category_id,
            'length' => $length,
            'width' => $width,
            'height' => $height,
            'unit_weight' => $unit_weight,
            'quantity' => $quantity,
            'unit' => $request->unit,
            'rate' => $rate,
            'total' => $total,
            'remarks' => $request->remarks,
        ]);

        return redirect()
            ->route('projectmanage.projects.site-measurements.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {

        $site_measurement = SiteMeasurements::with([
            'drawing',
            'drawingMeasurement',
            'measurementCategory'
        ])->findOrFail($id);
        
        $drawingMeasurements = DrawingMeasurement::with([
            'drawing',
            'measurementCategory'
        ])->get();
        $project->load('client');
        $categories = MeasurementCategories::all();
        return view('admin.backend.projectmanage.projects.site-measurements.edit', compact('project', 'site_measurement', 'drawingMeasurements', 'categories'));
    }

    public function update(Request $request, Project $project, $id)
    {
        
        $site_measurement = SiteMeasurements::findOrFail($id);
        
        $quantity = 0;

        $category = MeasurementCategories::findOrFail($request->category_id);
        

        switch ($category->formula_types) {

            case 'volume':
                $quantity = $request->length * $request->width * $request->height;
                break;

            case 'area':
                $quantity = $request->length * $request->width;
                break;

            case 'wall_area':
                $quantity = $request->length * $request->height;
                break;

            case 'painting_area':
                $quantity = 2 * ($request->length + $request->width) * $request->height;
                break;

            case 'steel_linear':
            case 'steel_handrail_linear':
                $quantity = $request->length;
                break;

            case 'weight':
                $quantity = $request->length * $request->unit_weight;
                break;
        }


        $total = $request->rate * $quantity;

        $site_measurement->update([
            'project_id' => $project->id,
            'drawing_id' => $request->drawing_id,
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'category_id' => $request->category_id,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'unit_weight' => $request->unit_weight,
            'quantity' => $quantity,
            'unit' => $request->unit,
            'rate' => $request->rate,
            'total' => $total,
            'remarks' => $request->remarks,
        ]);

        return redirect()
            ->route('projectmanage.projects.site-measurements.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $site_measurement = SiteMeasurements::findOrFail($id);

        $site_measurement->delete();

        return redirect()
            ->route('projectmanage.projects.site-measurements.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
