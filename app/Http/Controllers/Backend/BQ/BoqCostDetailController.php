<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Http\Controllers\Controller;
use App\Models\Boq;
use App\Models\BoqCategories;
use App\Models\BoqCostDetails;
use App\Models\BoqQuantityDetails;
use App\Models\DrawingMeasurement;
use App\Models\MaterialRate;
use App\Models\MaterialRequirements;
use App\Models\Project;
use App\Models\VariableAsset;
use Illuminate\Http\Request;

class BoqCostDetailController extends Controller
{
    public function index($projectId, $boqId)
    {
        $project = Project::findOrFail($projectId);

        $boq = Boq::findOrFail($boqId);


        $boqCostDetails = BoqCostDetails::where(
            'boq_id',
            $boqId
        )->get();

        $materialTotal = $boqCostDetails
            ->where('type', 'item')
            ->sum('amount');

        // $laborTotal = $boqCostDetails
        //     ->where('type', 'item')
        //     ->sum('amount');

        return view('admin.backend.bq.bq-cost-detail.index', compact('project', 'boq', 'boqCostDetails', 'materialTotal'));
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
        $boqQtyDetails = BoqQuantityDetails::where('type', 'item')
            ->orderBy('item_no')
            ->get();
        $materialRequirements = MaterialRequirements::all();
        // $boqQtyDetails = BoqQuantityDetails::all();
        $boqCategories = BoqCategories::all();
        // $clients = Client::all();
        $variableAssets = VariableAsset::all();

        return view('admin.backend.bq.bq-cost-detail.create', compact('project', 'boq', 'boqCostDetails', 'boqQtyDetails', 'materialRequirements', 'boqCategories', 'variableAssets'));
    }

    public function store(Project $project, Boq $boq, Request $request,)
    {
        // return $request->all();
        $sectionId = null;

        foreach ($request->rows as $row) {

            if ($row['type'] == 'section') {


                $section = BoqCostDetails::create([
                    'boq_id' => $boq->id,
                    'type' => 'section',
                    'item_no' => $row['item_no'],
                    'title' => $row['title'],
                    'remark' => $request->remark,
                ]);


                $sectionId = $section->id;
            } else {



                $boqQtyDetail = BoqQuantityDetails::find(
                    $row['boq_quantity_detail_id']
                );

                $bqDetail = BoqCostDetails::create([
                    'boq_id' => $boq->id,
                    'section_id' => $sectionId,
                    'type' => 'item',
                    'item_no' => $row['item_no'],
                    'title' => $boqQtyDetail?->title,
                    'boq_quantity_detail_id' => $row['boq_quantity_detail_id'],
                    'boq_category_id' => $row['boq_category_id'],
                    'material_requirement_id' => $row['material_requirement_id'],
                    'variable_asset_id' => $row['variable_asset_id'],
                    'unit' => $row['unit'] ?? '',
                    'quantity' => $row['quantity'] ?? '',
                    'unit_rate' => $row['unit_rate'] ?? '',
                    'amount' => $row['amount'] ?? '',
                    'remark' => $row['remark'] ?? '',
                ]);


                $materialTotal = BoqCostDetails::where('boq_id', $boq->id)
                    ->sum('amount');

                $boq->update([
                    'material_total' => $materialTotal,
                    'grand_total'    => $materialTotal,
                ]);
            }
        }

        return redirect()->route('projectmanage.projects.boq-cost-detail.index', [$project->id, $boq->id])->with([
            'message' => 'BOQ Cost Created successfully!',
            'alert-type' => 'success'
        ]);
    }





    public function getMaterialRequirementsByBoq(Request $request)
    {
        $boqQty = BoqQuantityDetails::findOrFail(
            $request->boq_quantity_detail_id
        );

        $requirements = MaterialRequirements::with('material')
            ->where(
                'drawing_measurement_id',
                $boqQty->drawing_measurement_id
            )
            ->get();

        return response()->json(
            $requirements->map(function ($item) {
                return [
                    'id' => $item->id,
                    'material_name' => $item->material?->name,
                    'quantity' => $item->final_quantity,
                    'unit' => $item->material?->unit,
                ];
            })
        );
    }



    public function getMaterialRequirement(Request $request)
    {
        $requirement = MaterialRequirements::with(
            'material.boqCategory',
        )->findOrFail($request->material_requirement_id);

        $rate = MaterialRate::where(
            'variable_asset_id',
            $requirement->variable_asset_id
        )
            ->orderByDesc('effective_date')
            ->first();

        return response()->json([
            'variable_asset_id' => $requirement->variable_asset_id,

            'material_name' => $requirement->material?->name,

            'boq_category_id' =>
            $requirement->material?->boq_category_id,

            'boq_category_name' =>
            $requirement->material?->boqCategory?->name,

            'quantity' => $requirement->final_quantity,

            'unit' => $requirement->material?->unit,

            'unit_rate' => $rate?->rate ?? 0,
        ]);
    }

    public function getVariableAsset(Request $request)
    {
        $variableAsset = VariableAsset::findOrFail(
            $request->variable_asset_id
        );

        return response()->json([
            'boq_category_id' => $variableAsset->boq_category_id,
            'name' => $variableAsset->name,
        ]);
    }



    public function getBoqCategory(Request $request)
    {
        $boqCategory = BoqCategories::findOrFail(
            $request->boq_category_id
        );

        return response()->json([
            'name' => $boqCategory->name,
        ]);
    }
}
