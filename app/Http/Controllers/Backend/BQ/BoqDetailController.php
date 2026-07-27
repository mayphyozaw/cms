<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Http\Controllers\Controller;
use App\Models\Boq;
use App\Models\BoqDetails;
use App\Models\BoqWorkCategories;
use App\Models\DrawingMeasurement;
use App\Models\Project;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class BoqDetailController extends Controller
{
    // public function index(Project $project, Boq $boq)
    // {
    //     $project->load('client');
    //     $boq->load([
    //         'details.drawingMeasurement.category',
    //         'details.workScope',
    //         'details.boqWorkCategory',
    //     ]);
    //     return view('admin.backend.bq.bq-detail.index', compact('project', 'boq'));
    // }

    public function index($projectId, $boqId)
    {
        $project = Project::findOrFail($projectId);

        $boq = Boq::findOrFail($boqId);

        $boqDetails = BoqDetails::where(
            'boq_id',
            $boqId
        )->get();

        return view(
            'admin.backend.bq.bq-detail.index',
            compact(
                'project',
                'boq',
                'boqDetails'
            )
        );
    }
    public function create(Project $project, Boq $boq)
    {
        $project->load('client');
        $boqDetails = BoqDetails::with([
            'drawingMeasurement.category',
            'workScope',
            'boqWorkCategory',
        ])->get();
        $workScopes = WorkScope::all();
        $boqCategories = BoqWorkCategories::all();
        $drawingMeasurements = DrawingMeasurement::all();
        return view('admin.backend.bq.bq-detail.create', compact('project', 'boq', 'boqDetails', 'workScopes', 'boqCategories', 'drawingMeasurements'));
    }

    
    public function getDrawingMeasurementDetail(Request $request)
    {
        $drawingMeasurement = DrawingMeasurement::with('category')
            ->findOrFail($request->drawing_measurement_id);

        return response()->json([
            'item_name' => $drawingMeasurement->category->name ?? $drawingMeasurement->description,
            'unit'      => $drawingMeasurement->unit,
            'quantity'  => $drawingMeasurement->quantity,
        ]);
    }
}
