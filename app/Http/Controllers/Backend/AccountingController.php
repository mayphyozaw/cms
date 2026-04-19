<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function index()
    {
        return view('admin.backend.accounting.dashboard');
    }
}
