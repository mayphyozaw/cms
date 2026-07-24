<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\MaterialMappings;
use App\Models\MeasurementCategories;
use App\Models\MixRatioDetails;
use App\Models\MixRatioTemplates;
use App\Models\Project;
use App\Models\VariableAsset;
use Illuminate\Http\Request;

class MaterialMappingController extends Controller
{

    public function index(Project $project)
    {
        $project->load('client');
        $materialMappings = MaterialMappings::with('mixRatio', 'category', 'material', 'drawingmeasurement.drawing')
            ->get();
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

        $coverageQty = $request->coverage_qty;
        $consumption_type = $request->consumption_type;
        $percent = $request->percentage;


        $detail = MixRatioDetails::where(
            'mix_ratio_template_id',
            $request->mix_ratio_template_id
        )
            ->where(
                'variable_asset_id',
                $request->variable_asset_id
            )
            ->first();


        $totalPart = MixRatioDetails::where(
            'mix_ratio_template_id',
            $request->mix_ratio_template_id
        )->sum('part');

        $consumption_ratio = 0;

        if ($consumption_type == 'Coverage') {

            $consumption_ratio = $coverageQty > 0
                ? (1 / $coverageQty)
                : 0;
        } elseif ($consumption_type == 'Fixed') {

            $consumption_ratio = $request->consumption_ratio;
        } elseif ($consumption_type == 'Percentage') {

            $consumption_ratio = $percent / 100;
        } elseif ($consumption_type == 'MixRatio') {

            $consumption_ratio = ($detail && $totalPart > 0)
                ? ($detail->part / $totalPart)
                : 0;
        }
        MaterialMappings::create([
            'measurement_category_id' => $request->measurement_category_id,
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'variable_asset_id' => $request->variable_asset_id,
            'consumption_type' => $consumption_type,
            'coverage_qty' => $coverageQty,
            'percentage' => $percent,
            'consumption_ratio' => $consumption_ratio,
            'mix_ratio_template_id' => $request->mix_ratio_template_id,
            'wastage_percentage' => $request->wastage_percentage,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);



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
        $materialMapping = MaterialMappings::with('mixRatio', 'category', 'material', 'drawingmeasurement.drawing')
            ->findOrFail($id);
        // $materialMapping = MaterialMappings::with('mixRatio', 'category', 'material')->findOrFail($id);
        $project->load('client');
        $consumption_type = $request->consumption_type;

        $consumption_ratio = $request->consumption_ratio;

        if ($consumption_type == 'Coverage') {

            $coverageQty = $request->coverage_quantity;

            $consumption_ratio = $coverageQty > 0
                ? (1 / $coverageQty)
                : 0;
        } elseif ($consumption_type == 'Fixed') {

            $consumption_ratio = $consumption_ratio;
        } elseif ($consumption_type == 'Percentage') {

            $consumption_ratio = $request->percentage / 100;
        } elseif ($consumption_type == 'MixRatio') {

            $mixRatio = MixRatioTemplates::find($request->mix_ratio_template_id);
            $consumption_ratio = $mixRatio->dry_volume_factor;
        }

        $materialMapping->update([
            'measurement_category_id' => $request->measurement_category_id,
            'drawing_measurement_id' => $request->drawing_measurement_id,
            'variable_asset_id' => $request->variable_asset_id,
            'coverage_qty'  => $request->coverage_qty,
            'percentage'    => $request->percentage,
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

    // public function getMaterialMapping(Request $request)
    // {

    //     $materialMapping = MaterialMappings::find($request->material_mapping_id);

    //     $mixRatioDetail = MixRatioDetails::where(
    //         'mix_ratio_template_id',
    //         $materialMapping->mix_ratio_template_id
    //     )
    //         ->where(
    //             'variable_asset_id',
    //             $materialMapping->variable_asset_id
    //         )
    //         ->first();


    //     if (!$materialMapping) {
    //         return response()->json(['error' => 'Drawing Measurement not found'], 404);
    //     }
    //     return response()->json([
    //         'id'           => $materialMapping->id,
    //         'variable_asset_id' => $materialMapping->variable_asset_id,
    //         'consumption_type'  => $materialMapping->consumption_type,
    //         'coverage_qty' => $materialMapping->coverage_qty,
    //         'consumption_ratio' => $materialMapping->consumption_ratio,
    //         'wastage_percentage'  => $materialMapping->wastage_percentage,
    //         'unit' => $materialMapping->material->unit,
    //     ]);
    // }

    public function getMaterialMapping(Request $request)
    {
        $materialMapping = MaterialMappings::with([
            'material',
            'mixRatio'
        ])->find($request->material_mapping_id);

        $mixRatioDetail = MixRatioDetails::where(
            'mix_ratio_template_id',
            $materialMapping->mix_ratio_template_id
        )
            ->where(
                'variable_asset_id',
                $materialMapping->variable_asset_id
            )
            ->first();

        if (!$materialMapping) {
            return response()->json(['error' => 'Drawing Measurement not found'], 404);
        }

        return response()->json([
            'id'           => $materialMapping->id,
            'variable_asset_id'      => $materialMapping->variable_asset_id,
            'consumption_type'       => $materialMapping->consumption_type,
            'coverage_qty'           => $materialMapping->coverage_qty,
            'consumption_ratio'      => $materialMapping->consumption_ratio,
            'wastage_percentage'     => $materialMapping->wastage_percentage,
            'mix_ratio_template_id'  => $materialMapping->mix_ratio_template_id,
            'dry_volume_factor' => $materialMapping->mixRatio->dry_volume_factor ?? 0,
            'unit'                   => $materialMapping->material?->unit,
        ]);
    }

    public function getMixRatio(Request $request)
    {
        $mixRatio = MixRatioTemplates::findOrFail(
            $request->mix_ratio_template_id
        );

        return response()->json([
            'id' => $mixRatio->id,
            'ratio_name' => $mixRatio->ratio_name,
            'dry_volume_factor' => $mixRatio->dry_volume_factor,
            'details' => $mixRatio->details,

        ]);
    }

    public function getConsumptionRatio_Old(Request $request)
    {
        $detail = MixRatioDetails::where(
            'mix_ratio_template_id',
            $request->mix_ratio_template_id
        )
            ->where(
                'variable_asset_id',
                $request->variable_asset_id
            )
            ->first();

        $template = MixRatioTemplates::find(
            $request->mix_ratio_template_id
        );

        $totalPart = MixRatioDetails::where(
            'mix_ratio_template_id',
            $request->mix_ratio_template_id
        )->sum('part');

        $ratio = ($detail && $totalPart > 0)
            ? ($detail->part / $totalPart)
            : 0;

        return response()->json([
            'dry_volume_factor' => $template->dry_volume_factor,
            'consumption_ratio' => round($ratio, 6),
        ]);
    }

    public function getConsumptionRatio(Request $request)
    {
        $templateId = $request->mix_ratio_template_id;
        $assetId = $request->variable_asset_id;

        if (!$templateId || !$assetId) {
            return response()->json([
                'dry_volume_factor' => 0,
                'consumption_ratio' => 0,
            ]);
        }

        $template = MixRatioTemplates::find($templateId);

        $detail = MixRatioDetails::where('mix_ratio_template_id', $templateId)
            ->where('variable_asset_id', $assetId)
            ->first();

        $totalPart = MixRatioDetails::where('mix_ratio_template_id', $templateId)
            ->sum('part');

        $ratio = 0;

        if ($detail && $totalPart > 0) {
            $ratio = $detail->part / $totalPart;
        }

        return response()->json([
            'dry_volume_factor' => $template?->dry_volume_factor ?? 0,
            'consumption_ratio' => round($ratio, 6),
        ]);
    }
}
