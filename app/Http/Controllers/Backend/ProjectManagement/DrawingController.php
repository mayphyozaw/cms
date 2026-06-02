<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Drawings;
use App\Models\DrawingTypes;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DrawingController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        // $drawings = Drawings::with('drawingType')->where('project_id', $project->id)->get(); 
        $drawings = $project->drawings()
            ->with('drawingType')
            ->orderBy('created_at', 'desc') 
            ->get();
        $drawing_types = DrawingTypes::all();
        return view('admin.backend.projectmanage.projects.drawings.index', compact('project', 'drawings', 'drawing_types'));
    }

    public function create(Project $project)
    {
        // $clients = Client::all();
        $project->load('client');
        $drawing_types = DrawingTypes::all();
        return view('admin.backend.projectmanage.projects.drawings.create', compact('project', 'drawing_types'));
    }
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'drawing_name' => 'required',
            'drawing_type_id' => 'required',
            'scale_ratio' => 'required',
            'drawing_file' => 'nullable|mimes:pdf,dwg,jpg,jpeg,png|max:20480',
        ]);

        $drawing_upload_file_name = null;
        $original_file_name = null;

        if ($request->hasFile('drawing_file')) {
            $drawing_upload_file = $request->file('drawing_file');
            $original_file_name = $drawing_upload_file->getClientOriginalName();
            $drawing_upload_file_name = uniqid() . '_' . time() . '.' . $drawing_upload_file->getClientOriginalExtension();
            $drawing_upload_file->move(public_path('/upload/drawings'), $drawing_upload_file_name);

            $drawingNo = 'P-00' . date('ymd');
            $revisionNo = $drawingNo . 'R1';

            Drawings::create([
                'project_id' => $project->id,
                'drawing_type_id' => $request->drawing_type_id,
                'drawing_name' => $request->drawing_name,
                'drawing_no' => $drawingNo,
                'revision_no' => $revisionNo,
                'scale_ratio' => $request->scale_ratio,
                'drawing_file' => $drawing_upload_file_name,
                'drawing_file_name' => $original_file_name,
                'remarks' => $request->remarks,
            ]);

            return redirect()
                ->route('projectmanage.projects.drawings.index', $project->id)
                ->with([
                    'message' => 'Successfully created',
                    'alert-type' => 'success'
                ]);
        }
    }

    public function edit(Project $project, $id)
    {
        // $clients = Client::all();
        $drawing = Drawings::findOrFail($id);
        $drawing_types = DrawingTypes::all();
        $project->load('client');
        return view('admin.backend.projectmanage.projects.drawings.edit', compact('project', 'drawing', 'drawing_types'));
    }

    public function update(Request $request, Project $project, $id)
    {

        $drawing = Drawings::findOrFail($id);

        $drawing_upload_file_name = $drawing->drawing_file;
        $original_file_name = $drawing->drawing_file_name;

        if ($request->hasFile('drawing_file')) {
            if ($drawing->drawing_file && file_exists(public_path('upload/drawings/' . $drawing->drawing_file))) {
                unlink(public_path('upload/drawings/' . $drawing->drawing_file));
            }

            $drawing_upload_file = $request->file('drawing_file');

            $original_file_name = $drawing_upload_file->getClientOriginalName();
            $drawing_upload_file_name = uniqid() . '_' . time() . '.' . $drawing_upload_file->getClientOriginalExtension();
            $drawing_upload_file->move(public_path('/upload/drawings'), $drawing_upload_file_name);
        }

        $drawingNo = $drawing->drawing_no;
        $lastRevNo = (int) str_replace(
            $drawingNo . 'R',
            '',
            $drawing->revision_no
        );
        $nextRev = $lastRevNo + 1;
        $revisionNo = $drawingNo . 'R' . $nextRev;
        
        $drawing->update([
            'project_id' => $project->id,
            'drawing_type_id' => $request->drawing_type_id,
            'drawing_name' => $request->drawing_name,
            'drawing_no' => $drawingNo,
            'revision_no' => $revisionNo,
            'scale_ratio' => $request->scale_ratio,
            'drawing_file' => $drawing_upload_file_name,
            'drawing_file_name' => $original_file_name,
            'remarks' => $request->remarks,
        ]);

        return redirect()
            ->route('projectmanage.projects.drawings.index', $project->id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $drawing = Drawings::findOrFail($id);

        if ($drawing->drawing_file && Storage::disk('public')->exists('upload/drawings/' . $drawing->drawing_file)) {
            Storage::disk('public')->delete('upload/drawings/' . $drawing->drawing_file);
        }

        $drawing->delete();

        return redirect()
            ->route('projectmanage.projects.drawings.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);

        // return response()->json([
        //     'message' => 'Drawing deleted successfully!'
        // ], 200);
    }
}
