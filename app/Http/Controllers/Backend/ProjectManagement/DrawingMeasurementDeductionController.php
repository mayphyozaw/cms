<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurementDeduction;
use App\Models\DrawingMeasurementDetail;
use App\Models\Project;
use Illuminate\Http\Request;

class DrawingMeasurementDeductionController extends Controller
{
    public function index(Project $project, $detailId)
    {
        $project->load('client');
        $deductions = DrawingMeasurementDeduction::with('drawingMeasurementDetail')->get();
        return view('admin.backend.projectmanage.projects.drawing-measurement-deduction.index', compact('project', 'deductions'));
    }



    public function create(Project $project, string $detailId)
    {
        $project->load('client');
        $detail = DrawingMeasurementDetail::where('id', $detailId)->first();

        return view('admin.backend.projectmanage.projects.drawing-measurement-deduction.create',
            compact('project', 'detail')
        );
    }


    public function store(Request $request, Project $project)
    {
        dd($request->all());

        $request->validate([
            'drawing_measurement_detail_id' => 'required|exists:drawing_measurement_details,id',
            'opening_type' => 'required',
            'width' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'nos' => 'required|numeric|min:1',
        ]);

        $area = $request->width * $request->height * $request->nos;

        DrawingMeasurementDeduction::create([
            'drawing_measurement_detail_id' => $request->drawing_measurement_detail_id,
            'opening_type' => $request->opening_type,
            'description' => $request->description,
            'width' => $request->width,
            'height' => $request->height,
            'nos' => $request->nos,
            'area' => $area,
            'remarks' => $request->remarks,
        ]);

        return redirect()
            ->route(
                'projectmanage.projects.drawing-measurement-deduction.index',
                $project->id
            )
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
}
