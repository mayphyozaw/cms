<?php

namespace App\Http\Controllers\Backend\BankManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return view('admin.backend.bankmanage.index');
    }
}
