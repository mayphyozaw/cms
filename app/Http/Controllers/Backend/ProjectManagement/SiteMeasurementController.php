<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
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
        $siteMeasurementAllData = SiteMeasurements::with([
            'drawing',
            'measurementCategory'
        ])
            ->where('project_id', $project->id)
            ->latest()
            ->get();
        return view('admin.backend.projectmanage.projects.site-measurements.index', compact('project', 'siteMeasurementAllData'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $drawings = Drawings::all();
        $categories = MeasurementCategories::all();
        return view('admin.backend.projectmanage.projects.site-measurements.create', compact('project', 'drawings', 'categories'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'unit_weight' => 'required',
            'rate' => 'required',
            'unit' => 'required',

        ]);

        $length = $request->length ?? 0;
        $width  = $request->width ?? 0;
        $height = $request->height ?? 0;
        $unit_weight = $request->unit_weight ?? 0;
        $rate = $request->rate ?? 0;

        $quantity = 0;

        $category = MeasurementCategories::findOrFail(
            $request->category_id
        );

        // Volume
        if ($category->symbol == 'V = L * W * H') {
            $quantity = $length * $width * $height;
        }

        // Area
        elseif ($category->symbol == 'WallArea = L * H') {

            $quantity = $length * $height;
        }

        elseif ($category->symbol == 'A = L * W') {

            $quantity = $length * $height;
        }

        // Linear
        elseif ($category->symbol == 'L') {
            $quantity = $length;
        }

        // Weight
        elseif ($category->symbol == 'W = L * Unit Weight') {

            $quantity = $length * $unit_weight;
        }

        
        $total = $rate * $quantity;

         SiteMeasurements::create([
            'project_id' => $project->id,
            'drawing_id' => $request->drawing_id,
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
}
