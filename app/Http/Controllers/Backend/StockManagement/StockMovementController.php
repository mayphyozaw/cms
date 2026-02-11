<?php

namespace App\Http\Controllers\Backend\StockManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        return view('admin.backend.stock-movements.index');
    }
}
