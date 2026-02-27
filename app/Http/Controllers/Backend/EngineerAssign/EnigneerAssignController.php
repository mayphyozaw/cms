<?php

namespace App\Http\Controllers\Backend\EngineerAssign;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\EngineerAssign;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class EnigneerAssignController extends Controller
{
    // public function index($id)
    // {

    //     $engineers = User::where('Engineer')->get();
    //     $client = Client::findOrFail($id);
    //     $assignProjects = EngineerAssign::with(['project'])->get();
    //     return view('admin.backend.engineerassign.assign-project',compact('assignProjects'));
    // }

    public function assignProject($id)
    {

        $user = User::with('engineerAssigns.project.client')->findOrFail($id);
        return view('admin.backend.engineerassign.assign-project', compact('user'));
    }

    public function assignProjectEdit($id)
    {
        $assignProject = EngineerAssign::with('user', 'project.client')
            ->findOrFail($id);
        $projects = Project::with('client')->get();
        return view('admin.backend.engineerassign.edit-assign', compact('assignProject', 'projects'));
    }

    public function assignProjectUpdate(Request $request, $id)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
        ]);

        $assignProject = EngineerAssign::findOrFail($id);

        $assignProject->update([
            'project_id' => $request->project_id,
        ]);


        return redirect()->route('assign-project', $assignProject->user_id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy($id)
    {

        $assignProject = EngineerAssign::findOrFail($id);
        $assignProject->delete();

        return redirect()
            ->route('assign-project', $assignProject->user_id)
            ->with('success', 'Assignment deleted successfully');

    }
}
