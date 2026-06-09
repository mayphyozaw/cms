<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\MaterialMappings;
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
        $materialMappings = MaterialMappings::with('mixRatio', 'category', 'material', 'drawingmeasurement')->get();
        return view('admin.backend.projectmanage.projects.material-mappings.index', compact('project', 'materialMappings'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $mixRatios = MixRatioTemplates::all();
        $drawingMeasurements = DrawingMeasurement::all();
        $measurementCategories = MeasurementCategories::all();
        $varilableAssets = VariableAsset::all();
        return view('admin.backend.projectmanage.projects.material-mappings.create', compact('project', 'mixRatios', 'varilableAssets', 'measurementCategories', 'drawingMeasurements'));
    }


    public function store(Request $request, Project $project)
    {
        
        $consumption_type = $request->consumption_type;

        $consumption_ratio = null;

        if ($consumption_type == 'coverage') {

            $coverageQty = $request->coverage_quantity;

            $consumption_ratio = $coverageQty > 0
                ? (1 / $coverageQty)
                : 0;


        } elseif ($consumption_type == 'fixed') {

            $consumption_ratio = 1;
        } elseif ($consumption_type == 'percentage') {

            $consumption_ratio = $request->percentage / 100;
        } elseif ($consumption_type == 'mix_ratio') {

            $consumption_ratio = null;
        }

        MaterialMappings::create([
            'measurement_category_id' => $request->measurement_category_id,
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'variable_asset_id' => $request->variable_asset_id,
            'consumption_type' => $consumption_type,
            'consumption_ratio' => $consumption_ratio,
            'mix_ratio_template_id' => $request->mix_ratio_template_id,
            'wastage_percentage' => $request->wastage_percentage,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        // return $matrial_mappings;

        return redirect()
            ->route(
                'projectmanage.projects.material-mappings.index',
                $project->id
            )
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {
        $materialMapping = MaterialMappings::with('mixRatio', 'category', 'material')->findOrFail($id);
        $project->load('client');
        $mixRatios = MixRatioTemplates::all();
        $drawingMeasurements = DrawingMeasurement::all();
        $measurementCategories = MeasurementCategories::all();
        $varilableAssets = VariableAsset::all();
        return view('admin.backend.projectmanage.projects.material-mappings.edit', compact('materialMapping', 'project', 'mixRatios', 'varilableAssets', 'measurementCategories', 'drawingMeasurements'));
    }

    public function update(Request $request, Project $project, $id)
    {
        $materialMapping = MaterialMappings::with('mixRatio', 'category', 'material')->findOrFail($id);
        $project->load('client');
        $consumption_type = $request->consumption_type;

        $consumption_ratio = null;

        if ($consumption_type == 'coverage') {

            $coverageQty = $request->coverage_quantity;

            $consumption_ratio = $coverageQty > 0
                ? (1 / $coverageQty)
                : 0;
            
        } elseif ($consumption_type == 'fixed') {

            $consumption_ratio = 1;
        } elseif ($consumption_type == 'percentage') {

            $consumption_ratio = $request->percentage / 100;
        } elseif ($consumption_type == 'mix_ratio') {

            $consumption_ratio = '-';
        }

        $materialMapping->update([
            'measurement_category_id' => $request->measurement_category_id,
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'variable_asset_id' => $request->variable_asset_id,
            'consumption_type' => $consumption_type,
            'consumption_ratio' => $consumption_ratio,
            'mix_ratio_template_id' => $request->mix_ratio_template_id,
            'wastage_percentage' => $request->wastage_percentage,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        // return $matrial_mappings;

        return redirect()
            ->route(
                'projectmanage.projects.material-mappings.index',
                $project->id
            )
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $materialMapping = MaterialMappings::findOrFail($id);
        $materialMapping->delete();

        return redirect()
            ->route('projectmanage.projects.material-mappings.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }

    public function getMaterialMapping(Request $request)
    {
        $materialMapping = MaterialMappings::find($request->material_mapping_id);

        if (!$materialMapping) {
            return response()->json(['error' => 'Drawing Measurement not found'], 404);
        }

        return response()->json([
            'id'           => $materialMapping->id,
            'variable_asset_id' => $materialMapping->variable_asset_id,
            'consumption_type'  => $materialMapping->consumption_type,
            'consumption_ratio' => $materialMapping->consumption_ratio,
            'wastage_percentage'  => $materialMapping->wastage_percentage,
            'unit' => $materialMapping->material->unit,
        ]);
    }
}
