<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DrawingMeasurementsController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        return view('admin.backend.projectmanage.projects.drawing-measurements.index', compact('project'));
    }
}
