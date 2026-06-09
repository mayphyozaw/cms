<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\MaterialMappings;
use App\Models\MixRatioTemplates;
use App\Models\Project;
use App\Models\VariableAsset;
use Illuminate\Http\Request;

class MaterialRequirementsController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        return view('admin.backend.projectmanage.projects.material-requirements.index', compact('project'));
    }

    

    public function create(Project $project)
    {
        $project->load('client');
        $drawingMeasurements = DrawingMeasurement::all();
        $materialMappings  = MaterialMappings::all();
        $variableAssets = VariableAsset::all();
        $mixRatios = MixRatioTemplates::all();
        return view('admin.backend.projectmanage.projects.material-requirements.create', compact('project', 'drawingMeasurements', 'materialMappings', 'variableAssets', 'mixRatios'));
    }

    public function getMixRatio(Request $request)
    {
        $mixRatio = MixRatioTemplates::findOrFail($request->id);
        return response()->json($mixRatio);
    }
}
