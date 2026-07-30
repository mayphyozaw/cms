<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Http\Controllers\Controller;
use App\Models\Boq;
use App\Models\BoqCategories;
use App\Models\BoqCostDetails;
use App\Models\BoqQuantityDetails;
use App\Models\MaterialRequirements;
use App\Models\Project;
use Illuminate\Http\Request;

class BoqCostDetailController extends Controller
{
    public function index($projectId, $boqId)
    {
        $project = Project::findOrFail($projectId);

        $boq = Boq::findOrFail($boqId);

        $boqQtyDetails = BoqQuantityDetails::where(
            'boq_id',
            $boqId
        )->get();

        return view('admin.backend.bq.bq-cost-detail.index',compact( 'project','boq','boqQtyDetails'));
    }
    public function create(Project $project, Boq $boq)
    {
        $project->load('client');
        $boqCostDetails = BoqCostDetails::with([
            'quantityDetail',
            'boqCategory',
            'materialRequirement',
            'material'
        ])->get();
        $materialRequirements = MaterialRequirements::all();
        // $clients = Client::all();
        $boqCategories = BoqCategories::all();

        return view('admin.backend.bq.bq-cost-detail.create', compact('project', 'boq', 'boqCostDetails'));
    }
}
