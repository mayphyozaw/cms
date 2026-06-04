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

    public function store(Request $request, Project $project)
    {

        $part = $request->part ?? 0;
        $width  = $request->width ?? 0;
        $height = $request->height ?? 0;
        $qty = $request->qty ?? 0;
        $unit_weight = $request->unit_weight ?? 0;
        $coats = $request->coats ?? 0;

        $totalPart = 0;

        $totalPart += $part;

        $category = MeasurementCategories::findOrFail(
            $request->measurement_categories_id
        );


        if ($request->consumption_type == 'fixed') {
            $consumption_ratio = 1;
        } elseif ($request->consumption_type == 'coverage') {

            $consumption_ratio = 1 / $request->coverage_qty;
        } elseif ($request->consumption_type == 'mix_ratio') {

            $consumption_ratio = $part / $totalPart;
        } elseif ($request->consumption_type == 'percentage') {

            $consumption_ratio = $request->percentage_value / 100;
        }
    }
}
