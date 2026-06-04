<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\MeasurementCategories;
use App\Models\MixRatioTemplates;
use App\Models\Project;
use App\Models\VariableAsset;
use Illuminate\Http\Request;

class MaterialMappingController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        return view('admin.backend.projectmanage.projects.material-mappings.index', compact('project'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $mixRatios = MixRatioTemplates::all();
        $measurementCategories = MeasurementCategories::all();
        $varilableAssets = VariableAsset::all();
        return view('admin.backend.projectmanage.projects.material-mappings.create', compact('project', 'mixRatios', 'varilableAssets', 'measurementCategories'));
    }

}
