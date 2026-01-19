<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Services\AdminUserService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        
        return view('admin.index');
    }

    public function userDatatable(Request $request)
    {
        return $this->userService->userDatatable($request);
    }
}
