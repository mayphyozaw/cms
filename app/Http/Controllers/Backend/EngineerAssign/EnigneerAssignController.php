<?php

namespace App\Http\Controllers\Backend\EngineerAssign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnigneerAssignController extends Controller
{
    public function index()
    {
        return view('admin.backend.engineerassign.index');
    }
}
