<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\Measurement_Types;
use App\Models\MeasurementTypes;
use App\Models\Project;
use Illuminate\Http\Request;

class MeasurementTypeController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $measurementTypes = MeasurementTypes::all();
        return view('admin.backend.projectmanage.projects.measurement-types.index', compact('project','measurementTypes'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        return view('admin.backend.projectmanage.projects.measurement-types.create',compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        
        $request->validate([
            'name' => 'required',
            'symbol' => 'required',
            'formula' => 'required',
        ]);
        
        MeasurementTypes::create([
            'name' => $request->name,
            'symbol' => $request->symbol,
            'formula' => $request->formula,
        ]);

        return redirect()
            ->route('projectmanage.projects.measurement-types.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {
        $project->load('client');
        $measurementType = MeasurementTypes::findOrFail($id);
        return view('admin.backend.projectmanage.projects.measurement-types.edit',compact('project','measurementType'));
    }

    public function update(Request $request, Project $project, $id)
    {
        $measurementType = MeasurementTypes::findOrFail($id);
        $measurementType->update([
            'name' => $request->name,
            'symbol' => $request->symbol,
            'formula' => $request->formula,
        ]);

        return redirect()
            ->route('projectmanage.projects.measurement-types.index',$project->id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }
    public function destroy(Project $project, $id)
    {
        $measurementType = MeasurementTypes::findOrFail($id);
        $measurementType->delete();

        return redirect()
            ->route('projectmanage.projects.measurement-types.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
