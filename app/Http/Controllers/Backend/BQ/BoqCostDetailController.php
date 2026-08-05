<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Http\Controllers\Controller;
use App\Models\Boq;
use App\Models\BoqCategories;
use App\Models\BoqCostDetails;
use App\Models\BoqQuantityDetails;
use App\Models\DrawingMeasurement;
use App\Models\Equipment;
use App\Models\EquipmentRequirements;
use App\Models\LaborRequirements;
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


        foreach ($boqCostDetails as $row) {

            if ($row->boqCategory?->name == 'Material') {

                $row->requirement_name =
                    MaterialRequirements::find($row->requirement_id)
                    ?->material?->name;
            } elseif ($row->boqCategory?->name == 'Labor') {

                $row->requirement_name =
                    LaborRequirements::find($row->requirement_id)
                    ?->laborType?->name;
            } elseif ($row->boqCategory?->name == 'Equipment') {

                $row->requirement_name =
                    EquipmentRequirements::find($row->requirement_id)
                    ?->equipment?->name;
            }
        }

        $grandTotal = $boqCostDetails
            ->where('type', 'item')
            ->sum('amount');


        return view('admin.backend.bq.bq-cost-detail.index', compact('project', 'boq', 'boqCostDetails', 'grandTotal'));
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

                BoqCostDetails::create([
                    'boq_id' => $boq->id,
                    'section_id' => $sectionId,
                    'type' => 'item',
                    'item_no' => $row['item_no'],
                    'title' => $boqQtyDetail?->title,
                    'boq_quantity_detail_id' => $row['boq_quantity_detail_id'],
                    'boq_category_id' => $row['boq_category_id'],
                    'requirement_id' => $row['requirement_id'],
                    'unit' => $row['unit'] ?? '',
                    'quantity' => $row['quantity'] ?? '',
                    'unit_rate' => $row['unit_rate'] ?? '',
                    'amount' => $row['amount'] ?? '',
                    'remark' => $row['remark'] ?? '',
                ]);
            }
            $materialCategory = BoqCategories::where('name', 'Material')->first();

            $materialTotal = BoqCostDetails::where('boq_id', $boq->id)
                ->where('boq_category_id', $materialCategory->id)
                ->sum('amount');

            $equipmentCategory = BoqCategories::where('name', 'Equipment')->first();

            $equipmentTotal = BoqCostDetails::where('boq_id', $boq->id)
                ->where('boq_category_id', $equipmentCategory->id)
                ->sum('amount');

            $laborCategory = BoqCategories::where('name', 'Labor')->first();

            $laborTotal = BoqCostDetails::where('boq_id', $boq->id)
                ->where('boq_category_id', $laborCategory->id)
                ->sum('amount');

            $grandTotal = $materialTotal + $equipmentTotal + $laborTotal;

            $boq->update([
                'material_total' => $materialTotal,
                'equipment_total' => $equipmentTotal,
                'labor_total' => $laborTotal,
                'grand_total'    => $grandTotal,
            ]);
        }

        return redirect()->route('projectmanage.projects.boq-cost-detail.index', [$project->id, $boq->id])->with([
            'message' => 'BOQ Cost Created successfully!',
            'alert-type' => 'success'
        ]);
    }





    // public function getMaterialRequirementsByBoq(Request $request)
    // {
    //     $boqQty = BoqQuantityDetails::findOrFail(
    //         $request->boq_quantity_detail_id
    //     );

    //     $requirements = MaterialRequirements::with('material')
    //         ->where(
    //             'drawing_measurement_id',
    //             $boqQty->drawing_measurement_id
    //         )
    //         ->get();

    //     return response()->json(
    //         $requirements->map(function ($item) {
    //             return [
    //                 'id' => $item->id,
    //                 'material_name' => $item->material?->name,
    //                 'quantity' => $item->final_quantity,
    //                 'unit' => $item->material?->unit,
    //             ];
    //         })
    //     );
    // }



    // public function getMaterialRequirement(Request $request)
    // {
    //     $requirement = MaterialRequirements::with(
    //         'material.boqCategory',
    //     )->findOrFail($request->material_requirement_id);

    //     $rate = MaterialRate::where(
    //         'variable_asset_id',
    //         $requirement->variable_asset_id
    //     )
    //         ->orderByDesc('effective_date')
    //         ->first();

    //     return response()->json([
    //         'variable_asset_id' => $requirement->variable_asset_id,

    //         'material_name' => $requirement->material?->name,

    //         'boq_category_id' =>
    //         $requirement->material?->boq_category_id,

    //         'boq_category_name' =>
    //         $requirement->material?->boqCategory?->name,

    //         'quantity' => $requirement->final_quantity,

    //         'unit' => $requirement->material?->unit,

    //         'unit_rate' => $rate?->rate ?? 0,
    //     ]);
    // }



    public function getRequirementDetail(Request $request)
    {
        $category = BoqCategories::findOrFail(
            $request->boq_category_id
        );

        if ($category->name == 'Material') {

            $requirement = MaterialRequirements::with('material')
                ->findOrFail($request->requirement_id);

            return response()->json([
                'unit'     => $requirement->material?->unit,
                'quantity' => $requirement->final_quantity,
                // 'rate'     => $requirement->material?->materialRate?->rate ?? 0,
            ]);
        }

        if ($category->name == 'Labor') {

            $requirement = LaborRequirements::with('laborType')
                ->findOrFail($request->requirement_id);

            return response()->json([
                'unit'     => $requirement->required_unit,
                'quantity' => $requirement->required_qty,
                // 'rate'     => $requirement->laborType?->laborRate?->rate ?? 0,
            ]);
        }

        if ($category->name == 'Equipment') {

            $requirement = EquipmentRequirements::with('equipment')
                ->findOrFail($request->requirement_id);

            return response()->json([
                'unit'     => $requirement->required_unit,
                'quantity' => $requirement->required_qty,
                // 'rate'     => $requirement->equipment?->equipmentRate?->rate ?? 0,
            ]);
        }
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





    public function getRequirementsByCategory(Request $request)
    {

        $category = BoqCategories::findOrFail($request->boq_category_id);
        $boqQty = BoqQuantityDetails::findOrFail($request->boq_quantity_detail_id);

        $drawingMeasurementId = $boqQty->drawing_measurement_id;

        if ($category->name == 'Material') {

            $requirements = MaterialRequirements::with('material')
                ->where('drawing_measurement_id', $drawingMeasurementId)
                ->get()
                ->map(function ($item) {
                    return [
                        'id'   => $item->id,
                        'name' => $item->material?->name,
                    ];
                });
        } elseif ($category->name == 'Labor') {

            $requirements = LaborRequirements::with('laborType')
                ->where('drawing_measurement_id', $drawingMeasurementId)
                ->get()
                ->map(function ($item) {
                    return [
                        'id'   => $item->id,
                        'name' => $item->laborType?->name,
                    ];
                });
        } elseif ($category->name == 'Equipment') {

            $requirements = EquipmentRequirements::with('equipment')
                ->where('drawing_measurement_id', $drawingMeasurementId)
                ->get()
                ->map(function ($item) {
                    return [
                        'id'   => $item->id,
                        'name' => $item->equipment?->name,
                    ];
                });
        } else {

            $requirements = collect();
        }

        return response()->json($requirements);
    }
}
