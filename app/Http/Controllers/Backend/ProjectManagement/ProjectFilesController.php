<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFiles\ProjectFileStoreRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectFile;
use Illuminate\Http\Request;

class ProjectFilesController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $project_categories = ProjectCategory::all();
        return view('admin.backend.projectmanage.projectfiles.index', compact('projects', 'project_categories'));
    }

    // public function create()
    // {
    //     return view('admin.backend.projectmanage.projectfiles.create');
    // }

    public function store(ProjectFileStoreRequest $request)
    {
        
        $upload_files_name = null;
        if ($request->hasFile('files')) {
            $upload_file = $request->file('files');
            $upload_files_name = uniqid() . '_' . time() . '.' . $upload_file->getClientOriginalExtension();
            $upload_file->move(public_path('/upload/project_files'), $upload_files_name);
        }
        ProjectFile::create([
            'project_id' => $request->project_id,
            'project_category_id' => $request->project_category_id,
            'files' => $upload_files_name,
            'remark' => $request->remark,
            'uploaded_at' => now(),
            'uploaded_by' => auth()->check() ? auth()->id() : null,
        ]);

        // return redirect()->route('projectmanage.projectfiles.index')
        //     ->with([
        //         'message' => 'Successfully created',
        //         'alert-type' => 'success'
        //     ]);
        return back()->with('success', 'File uploaded successfully');
    }
}
