<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurementDeduction;
use App\Models\DrawingMeasurementDetail;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrawingMeasurementDeductionController extends Controller
{
    public function index(Project $project, DrawingMeasurementDetail $detail)
    {
        $project->load('client');
        // $deductions = DrawingMeasurementDeduction::with('drawingMeasurementDetail')->get();
        return view('admin.backend.projectmanage.projects.drawing-measurement-deduction.index', compact('project', 'detail'));
    }



    public function create(Project $project, DrawingMeasurementDetail $detail)
    {
        $project->load('client');

        return view('admin.backend.projectmanage.projects.drawing-measurement-deduction.create',
            compact('project', 'detail')
        );
    }


    public function store(Request $request, Project $project, DrawingMeasurementDetail $detail)
    {


        $request->validate([
            'drawing_measurement_detail_id' => 'required|exists:drawing_measurement_details,id',
            'opening_type'                  => 'required|array',
            'opening_type.*'                => 'nullable|string', // Changed to nullable if index 1 can be missing
            'width'                         => 'required|array',
            'width.*'                       => 'required|numeric|min:0',
            'height'                        => 'required|array',
            'height.*'                      => 'required|numeric|min:0',
            'nos'                           => 'required|array',
            'nos.*'                         => 'required|numeric|min:1',
        ]);

        // dd(
        //     $request->opening_type,
        //     $request->description
        // );

        foreach ($request->width as $key => $width) {

            $height = $request->height[$key] ?? 0;
            $nos    = $request->nos[$key] ?? 1;
            $area = $width * $height * $nos;

            $deductions = DrawingMeasurementDeduction::create([
                'drawing_measurement_detail_id' => $request->drawing_measurement_detail_id,
                'opening_type' => $request->opening_type[$key] ?? '',
                'description' => $request->description[$key] ?? '',
                'width' => $width,
                'height' => $height,
                'nos' => $nos,
                'area' => $area,
            ]);
        }
        // return $deductions;
        $detail = DrawingMeasurementDetail::findOrFail(
            $request->drawing_measurement_detail_id
        );

        $totalDeduction = DrawingMeasurementDeduction::where(
            'drawing_measurement_detail_id',
            $detail->id
        )->sum('area');

        $detail->update([
            'deduction' => $totalDeduction,
            'net_quantity' => $detail->gross_quantity - $totalDeduction,
        ]);

        return redirect()
            ->route('projectmanage.projects.drawing-measurement-detail.index', [$project->id, $detail->id])
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
}
