<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Http\Controllers\Controller;
use App\Models\Boq;
use App\Models\BoqDetails;
use App\Models\BoqWorkCategories;
use App\Models\Client;
use App\Models\DrawingMeasurement;
use App\Models\MeasurementCategories;
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
        $drawingMeasurements = DrawingMeasurement::with('category')->get();
        $boqDetails = BoqDetails::with([
            'drawingMeasurement.category',
            'workScope',
            'boqWorkCategory',
        ])->get();
        $workScopes = WorkScope::all();
        $clients = Client::all();
        $boqCategories = BoqWorkCategories::all();

        return view('admin.backend.bq.bq-detail.create', compact('project', 'boq', 'boqDetails', 'workScopes', 'boqCategories', 'drawingMeasurements', 'clients'));
    }


    

    public function getDrawingMeasurementDetail(Request $request)
    {
        $measurement = DrawingMeasurement::findOrFail(
            $request->drawing_measurement_id
        );

        return response()->json([
            'unit'     => $measurement->unit,
            'quantity' => $measurement->quantity,
        ]);
    }
}
