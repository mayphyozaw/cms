<?php

namespace App\Http\Controllers\Backend\MaterialManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FixedAssetsController extends Controller
{
    public function index()
    {
        return view('admin.backend.materialmanage.fixedassets.index');
    }
}
