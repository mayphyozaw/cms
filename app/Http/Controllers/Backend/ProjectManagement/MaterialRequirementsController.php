<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\MaterialMappings;
use App\Models\MaterialRequirements;
use App\Models\MixRatioTemplates;
use App\Models\Project;
use App\Models\VariableAsset;
use Illuminate\Http\Request;

class MaterialRequirementsController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $materialRequirements = MaterialRequirements::with('drawingmeasurement', 'materialMapping', 'material')->get();
        return view('admin.backend.projectmanage.projects.material-requirements.index', compact('project', 'materialRequirements'));
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

    public function store(Request $request, Project $project)
    {
        $material = VariableAsset::findOrFail(
            $request->variable_asset_id
        );

        $drawingMeasurement = DrawingMeasurement::findOrFail(
            $request->drawing_measurement_id
        );

        $raw_quantity = $drawingMeasurement->quantity;

        $consumption_type = $request->consumption_type;
        $consumption_ratio = 0;

        switch ($consumption_type) {

            case 'coverage':
                $coverageQty = $request->coverage_qty ?? 0;
                $consumption_ratio = $coverageQty > 0
                    ? (1 / $coverageQty)
                    : 0;

                break;

            case 'fixed':
                $consumption_ratio = 1;
                break;

            case 'percentage':
                $consumption_ratio = ($request->percentage ?? 0) / 100;
                break;

            case 'mix_ratio':
                $consumption_ratio = 0;
                break;
        }

        $base_quantity = 0;



        if ($consumption_type !== 'mix_ratio') {
            $base_quantity = $raw_quantity * $consumption_ratio;
        }

        $wastage_percentage = $request->wastage_percentage ?? 0;

        $final_quantity = $base_quantity *
            (1 + ($wastage_percentage / 100));

        MaterialRequirements::create([
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'material_mapping_id'    => $request->material_mapping_id,
            'variable_asset_id'      => $request->variable_asset_id,
            'raw_quantity'           => $raw_quantity,
            'base_quantity'          => $base_quantity,
            'final_quantity'         => $final_quantity,
            'unit'                   => $material->unit,
            'status'                 => $request->status,
            'remark'                 => $request->remark,
        ]);

        // return $material_requirements;
        return redirect()->route(
            'projectmanage.projects.material-requirements.index',
            ['project' => $project->id]
        )->with([
            'message' => 'Successfully created',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Project $project, $id)
    {
        $materialRequirement = MaterialRequirements::with('drawingmeasurement', 'materialMapping', 'material')->findOrFail($id);
        $project->load('client');
        $materialMappings = MaterialMappings::all();
        $drawingMeasurements = DrawingMeasurement::all();
        $varilableAssets = VariableAsset::all();
        return view('admin.backend.projectmanage.projects.material-requirements.edit', compact('materialMappings', 'project', 'materialRequirement', 'varilableAssets', 'drawingMeasurements'));
    }




    public function getDrawingMeasurement(Request $request)
    {
        $drawingMeasurement =
            DrawingMeasurement::findOrFail(
                $request->drawing_measurement_id
            );

        $materialMapping =
            MaterialMappings::with('mixRatio')
            ->where(
                'drawing_measurement_id',
                $drawingMeasurement->id
            )
            ->first();

        
        return response()->json([
            'quantity' => $drawingMeasurement->quantity,

            'material_mapping_id' => $materialMapping->id,

            'variable_asset_id' => $materialMapping->variable_asset_id,

            'consumption_type' => $materialMapping->consumption_type,

            'consumption_ratio' => $materialMapping->consumption_ratio,

            'mix_ratio_template_id' => $materialMapping->mix_ratio_template_id,

            'dry_volume_factor' => optional($materialMapping->mixRatio)->dry_volume_factor,

            'wastage_percentage' => $materialMapping->wastage_percentage,
        ]);
    }
}
