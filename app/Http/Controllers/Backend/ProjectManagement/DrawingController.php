<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\Drawings;
use App\Models\Project;
use Illuminate\Http\Request;

class DrawingController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $drawings = Drawings::where('project_id', $project->id)->get();
        return view('admin.backend.projectmanage.projects.drawings.index',compact('project','drawings'));
    }
}
