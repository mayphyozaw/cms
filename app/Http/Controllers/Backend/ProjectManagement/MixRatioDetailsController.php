<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\MixRatioDetails\MixRatioDetailStoreRequest;
use App\Http\Requests\MixRatioDetails\MixRatioDetailUpdateRequest;
use App\Models\MixRatioDetails;
use App\Models\MixRatioTemplates;
use App\Models\Project;
use App\Models\VariableAsset;
use Illuminate\Http\Request;

class MixRatioDetailsController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');

        $mixRatioDetails = MixRatioDetails::with(['mixRatio', 'material'])->get();

        return view('admin.backend.projectmanage.projects.mixRatio-details.index', compact('project', 'mixRatioDetails'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $mixRatios = MixRatioTemplates::all();
        $varilableAssets = VariableAsset::all();
        return view('admin.backend.projectmanage.projects.mixRatio-details.create', compact('project', 'mixRatios', 'varilableAssets'));
    }

    public function store1(MixRatioDetailStoreRequest $request, Project $project)
    {
        $part = (float) $request->part;

        $existingTotalPart = MixRatioDetails::where(
            'mix_ratio_template_id',
            $request->mix_ratio_template_id
        )->sum('part');

        $totalPart = $existingTotalPart + $part;

        $consumption_ratio = $totalPart > 0
            ? ($part / $totalPart)
            : 0;

        MixRatioDetails::create([
            'mix_ratio_template_id' => $request->mix_ratio_template_id,
            'variable_asset_id'     => $request->variable_asset_id,
            'part'                  => $part,
            'total_part'            => $totalPart,
            'consumption_ratio'     => $consumption_ratio,
        ]);

        return redirect()
            ->route('projectmanage.projects.mixRatio-details.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function store(MixRatioDetailStoreRequest $request, Project $project)
    {

         MixRatioDetails::create([
            'mix_ratio_template_id' => $request->mix_ratio_template_id,
            'variable_asset_id'     => $request->variable_asset_id,
            'part'                  => $request->part,
        ]);

        // $this->recalculateRatio(
        //     $request->mix_ratio_template_id
        // );

        return redirect()
            ->route(
                'projectmanage.projects.mixRatio-details.index',
                $project->id
            )
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }


    private function recalculateRatio($templateId)
    {
        $details = MixRatioDetails::where(
            'mix_ratio_template_id',
            $templateId
        )->get();

        $totalPart = $details->sum('part');

        foreach ($details as $detail) {

            $detail->update([
                'total_part' => $totalPart,
                'consumption_ratio' =>
                $totalPart > 0
                    ? ($detail->part / $totalPart)
                    : 0
            ]);
        }
    }
    public function edit(Project $project, $id)
    {
        $project->load('client');
        $mixRatios = MixRatioTemplates::all();
        $varilableAssets = VariableAsset::all();
        $mixRatioDetail = MixRatioDetails::with(['mixRatio', 'material'])->findOrFail($id);
        return view('admin.backend.projectmanage.projects.mixRatio-details.edit', compact('project', 'mixRatioDetail', 'mixRatios', 'varilableAssets'));
    }

    public function update(MixRatioDetailUpdateRequest $request, Project $project, $id)
    {
        $mixRatioDetail = MixRatioDetails::findOrFail($id);
        $mixRatioDetail->update([
            'mix_ratio_template_id'  => $request->mix_ratio_template_id,
            'variable_asset_id' => $request->variable_asset_id,
            'part' => $request->part,
        ]);

        return redirect()
            ->route('projectmanage.projects.mixRatio-details.index', $project->id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $mixRatioDetail = MixRatioDetails::findOrFail($id);
        $mixRatioDetail->delete();

        return redirect()
            ->route('projectmanage.projects.mixRatio-details.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }

    public function mixRatioTotalPart(Request $request)
    {
        $existingTotalPart = MixRatioDetails::where(
            'mix_ratio_template_id',
            $request->mix_ratio_template_id
        )->sum('part');

        return response()->json([
            'existing_total_part' => $existingTotalPart,
        ]);
    }
}
