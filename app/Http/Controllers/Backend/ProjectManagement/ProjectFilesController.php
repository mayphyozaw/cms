<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFiles\ProjectFileStoreRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ProjectFilesController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $project_categories = ProjectCategory::all();
        return view('admin.backend.projectmanage.projectfiles.index', compact('projects', 'project_categories'));
    }


    public function store(ProjectFileStoreRequest $request)
    {
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as  $file) {
                $upload_file_name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/upload/project_files'), $upload_file_name);
                $original_file_name = $file->getClientOriginalName();

                ProjectFile::create([
                    'project_id' => $request->project_id,
                    'project_category_id' => $request->project_category_id,
                    'files' => $upload_file_name,
                    'file_name' => $original_file_name,
                    'remark' => $request->remark,
                    'uploaded_at' => now(),
                    'uploaded_by' => auth()->check() ? auth()->id() : null,
                ]);
            }
        }

        return back()->with([
            'success' => 'File uploaded successfully',
            'project_id' => $request->project_id,
            'project_category_id' => $request->project_category_id,
            'open_upload_modal' => true,
        ]);


        // return redirect()->route('projectmanage.projects.index', [
        //     'open_model' => 'true',
        //     'project_id' => $request->project_id,
        //     'project_category_id' => $request->project_category_id,
        // ])->with('success', 'File uploaded successfully');
    }

    public function get_project_files(Request $request)
    {
        $project_id = $request->project_id;
        $project_category_id = $request->project_category_id;

        $porject_files = ProjectFile::with('user')
            ->where('project_id', $project_id)
            ->where('project_category_id', $project_category_id)
            ->get();

        return response()->json([
            'files' => $porject_files,
        ]);
    }

    public function get_project_files_with_view(Request $request)
    {
        $project_id = $request->project_id;
        $project_category_id = $request->project_category_id;

        $porject_files = ProjectFile::with('user')
            ->where('project_id', $project_id)
            ->where('project_category_id', $project_category_id)
            ->get();

        $html = view('components.project_files_tbody', [
            'project_files' => $porject_files
        ])->render();

        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->project_file_id;
        ProjectFile::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Project file deleted successfully!'
        ]);
    }
}
