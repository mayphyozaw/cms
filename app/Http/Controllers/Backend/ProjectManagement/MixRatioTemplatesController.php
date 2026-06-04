<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\MixRatio\MixRatioStoreRequest;
use App\Http\Requests\MixRatio\MixRatioUpdateRequest;
use App\Models\MixRatioTemplates;
use App\Models\Project;
use Illuminate\Http\Request;

class MixRatioTemplatesController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $mixRatioTemps = MixRatioTemplates::all();
        return view('admin.backend.projectmanage.projects.mixRatio.index', compact('project','mixRatioTemps'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        return view('admin.backend.projectmanage.projects.mixRatio.create', compact('project'));
    }

    public function store(MixRatioStoreRequest $request, Project $project)
    {

        $lastMixRatio = MixRatioTemplates::latest('id')->first();
        $nextId = $lastMixRatio ? $lastMixRatio->id + 1 : 1;

        $mixRatioCode = 'MX -' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        
        MixRatioTemplates::create([
            'code'  => $mixRatioCode,
            'ratio_name'  => $request->ratio_name,
            'ratio_type' => $request->ratio_type,
            'dry_volume_factor' => $request->dry_volume_factor,
            'description' => $request->description,
            'status' => $request->status ?? null,

        ]);

        return redirect()->route('projectmanage.projects.mixRatio.index',$project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
    public function edit(Project $project, $id)
    {
        $project->load('client');
        $mixRatio = MixRatioTemplates::findOrFail($id);
        return view('admin.backend.projectmanage.projects.mixRatio.edit', compact('project', 'mixRatio'));
    }
    
    public function update(MixRatioUpdateRequest $request, Project $project, $id)
    {
        $mixRatio = MixRatioTemplates::findOrFail($id);
        $mixRatio->update([
            'ratio_name'  => $request->ratio_name,
            'ratio_type' => $request->ratio_type,
            'dry_volume_factor' => $request->dry_volume_factor,
            'description' => $request->description,
            'status' => $request->status ?? null,
        ]);

        return redirect()
            ->route('projectmanage.projects.mixRatio.index',$project->id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $mixRatio = MixRatioTemplates::findOrFail($id);
        $mixRatio->delete();

        return redirect()
            ->route('projectmanage.projects.mixRatio.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
