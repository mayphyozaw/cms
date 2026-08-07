<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\Drawings;
use App\Models\MeasurementCategories;
use App\Models\Project;
use App\Models\SiteMeasurements;
use App\Models\User;
use Illuminate\Http\Request;

class SiteMeasurementController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $siteMeasurementAllData = SiteMeasurements::all();
        // $siteMeasurementAllData = SiteMeasurements::with([
        //     'drawing',
        //     'category'
        // ])
        //     ->where('project_id', $project->id)
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        return view('admin.backend.projectmanage.projects.site-measurements.index', compact('project', 'siteMeasurementAllData'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        // $site_measurement = SiteMeasurements::with([
        //     'drawingMeasurement',
        //     'drawing'
        // ])->get();
        // $drawingMeasurements = DrawingMeasurement::with([
        //     'drawing',
        //     'category'
        // ])->get();
        // $categories = MeasurementCategories::all();
        $users = User::all();
        return view('admin.backend.projectmanage.projects.site-measurements.create', compact('project','users'));
    }

    public function store(Request $request, Project $project)
    {


        $request->validate([
            'measurement_date'        => 'required|date',
            'created_by'  => 'required|exists:users,id',

        ]);

        $lastSiteMeasurement = SiteMeasurements::latest('id')->first();
        $nextId = $lastSiteMeasurement ? $lastSiteMeasurement->id + 1 : 1;

        $measurementNo = 'SE-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        SiteMeasurements::create([
            'project_id' => $project->id,
            'measurement_no' => $measurementNo,
            'measurement_date' => $request->measurement_date,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'created_by' => $request->created_by,
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
            'category'
        ])->findOrFail($id);
        
        $drawingMeasurements = DrawingMeasurement::with([
            'drawing',
            'category'
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
